<x-app-layout>
    <x-calendar/>
    <x-slot name=title>本日の記録</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <button type="button" onclick="location.href='{{ route('meal_records.index') }}'">本日の記録を追加</button>
         @if (!empty($b))
            @foreach ($b as $record)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ $record->meal_type }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $record->meal_time }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $record->meal_calory }}kcal
                            </th>
                        </tr>
                    </thead>
                    @if (!empty($record))
                        @foreach ($record->foodRegistrations as $food)
                            <tbody>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
