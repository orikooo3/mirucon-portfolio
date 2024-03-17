<x-app-layout>
    <x-calendar />
    <x-slot name=title>本日の記録</x-slot>
    <div class="relative overflow-y-auto ">
        <div class="flex flex-col items-center sm:justify-center sm:pt-0 bg-main-color">
            <x-action-button type="button" class="my-8 w-52" onclick="location.href='{{ route('meal_records.index') }}'">
                <i class="fa-regular fa-plus my-auto mr-1"></i>本日の記録を追加
            </x-action-button>
            @if (!empty($b))
                @foreach ($b as $record)
                    <table class="w-2/5 text-sm text-left mb-10 ">
                        <thead class="text-xs text-white-color bg-sub-color dark:text-white-color dark:bg-sub-color">
                            <tr class="">
                                <th scope="col" class="px-6 py-3">
                                    {{ $record->meal_type }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ substr($record->meal_time, 0, 5) }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{-- 記録総カロリー --}}
                                    {{ $record->meal_calorie }}kcal
                                </th>
                            </tr>
                        </thead>
                        @if (!empty($record))
                            @foreach ($record->foodRegistrations as $food)
                                <tbody class="">
                                    <tr
                                        class="text-black-color bg-white-color border-b dark:text-black-colork dark:bg-white-color dark:border-explain-color-color">
                                        <td colspan="2" scope="row" class="px-6 text-xl">
                                            <div class="flex">
                                                <div class="text-lg">{{ $food->food_name }}</div>
                                                <div class="text-base mt-0.5">{{ '(' . $food->grams . 'g)' }}</div>
                                            </div>
                                            <div class="text-sm text-gray-color">{{ $food->calorie }}kcal</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class=" text-center">{{ $food->quantity }}人前</div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @endif
                    </table>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
