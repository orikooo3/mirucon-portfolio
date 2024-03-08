<x-app-layout>
    <x-calendar />
    <x-slot name=title>本日の記録</x-slot>
    <div class="relative overflow-y-auto shadow-md sm:rounded-lg bg-bkg-color">
        <div class="flex flex-col items-center sm:justify-center sm:pt-0">
            <x-action-button type="button" class="my-5 w-64" onclick="location.href='{{ route('meal_records.index') }}'">
                <i class="fa-regular fa-plus my-auto mr-1"></i>本日の記録を追加
            </x-action-button>
            @if (!empty($b))
                @foreach ($b as $record)
                    <table class="w-3/5 text-sm mb-10 text-left">
                        <thead class="text-xs text-white-color bg-main-color dark:text-white-color dark:bg-main-color">
                            <tr class="">
                                <th scope="col" class="px-6 py-3">
                                    {{ $record->meal_type }}
                                </th>
                                <th scope="col" class="px-6">
                                    {{ $record->meal_time }}
                                </th>
                                <th scope="col" class="px-6">
                                    {{-- 記録総カロリー --}}
                                    {{ $record->meal_calory }}kcal
                                </th>
                            </tr>
                        </thead>
                        @if (!empty($record))
                            @foreach ($record->foodRegistrations as $food)
                                <tbody
                                    class="text-black-color bg-white-color border-b dark:text-black-color dark:bg-white-color dark:border-explain-color-color">
                                    <tr>
                                        <td scope="row" class="px-6 text-xl">
                                            {{ $food->food_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $food->grams }}g
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $food->calory }}kcal
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
