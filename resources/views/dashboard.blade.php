<x-app-layout>
    <x-calendar />
    <x-slot name=title>本日の記録</x-slot>
    <div class="flex flex-col items-center sm:justify-center sm:pt-0 bg-main-color">
        <x-action-button type="button" class="my-5 w-64" onclick="location.href='{{ route('meal_records.index') }}'">
            <i class="fa-regular fa-plus my-auto mr-1"></i>本日の記録を追加
        </x-action-button>
        {{-- <div class="relative overflow-y-auto shadow-md sm:rounded-lg"> --}}
            @if (!empty($b))
                @foreach ($b as $record)
                    <table class="mb-10 text-left ">
                        <thead class="">
                            <tr class="text-lg text-white-color bg-sub-color dark:text-white-color dark:bg-sub-color ">
                                <th scope="col" class="pl-6 py-3">
                                    {{ $record->meal_type }}
                                </th>
                                <th scope="col" class="pr-40">
                                    {{ substr($record->meal_time, 0, 5) }}
                                </th>
                                <th scope="col" class="px-6">
                                    {{-- 記録総カロリー --}}
                                    {{ $record->meal_calorie }}kcal
                                </th>
                            </tr>
                        </thead>
                        @if (!empty($record))
                            @foreach ($record->foodRegistrations as $food)
                                <tbody class="">
                                    <tr
                                        class="text-black-color bg-white-color border-b dark:text-black-color dark:bg-white-color dark:border-explain-color-color">
                                        <td scope="row" class="px-6 text-xl">
                                            <div class="text-base">{{ $food->food_name }}</div>
                                            <div class="text-xs text-explain-color">{{ $food->calorie }}kcal</div>
                                        </td>
                                        <td class="px-6 py-4">

                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- 食品の個数を配置 --}}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @endif
                    </table>
                @endforeach
            @endif
        {{-- </div> --}}
    </div>
</x-app-layout>
