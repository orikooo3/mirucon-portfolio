<x-app-layout>
    <x-calendar />
    <x-slot name=title>本日の記録</x-slot>
    <div class="my-3 w-screen flex justify-center items-center flex-col sm:rounded-lg">
        <x-submit-button type="button" class="my-5" onclick="location.href='{{ route('meal_records.index') }}'">
            <x-slot name='max'><i class="fa-regular fa-plus mt-1"></i>本日の記録を追加</x-slot>
        </x-submit-button>
        @if (!empty($b))
            @foreach ($b as $record)
                <table class="w-3/5 text-sm  text-left">
                    <thead class="text-xs text-white-color bg-main-color dark:text-white-color dark:bg-main-color">
                        <tr class="">
                            <th scope="col" class="px-6 py-3">
                                {{ $record->meal_type }}
                            </th>
                            <th scope="col" class="px-6">
                                {{ $record->meal_time }}
                            </th>
                            <th scope="col" class="px-6">
                                {{ $record->meal_calory }}kcal
                            </th>
                        </tr>
                    </thead>
                    @if (!empty($record))
                        @foreach ($record->foodRegistrations as $food)
                            <tbody
                                class="text-black-color bg-white-color border-b dark:text-black dark:bg-white-color dark:border-explain-color-color">
                                <tr>
                                    <td scope="row" class="px-6 text-xl text-gray-900 dark:text-black-color">
                                        {{ $food->food_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $food->grams }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $food->calory }}
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>
                <br>
            @endforeach
        @endif
    </div>
</x-app-layout>
