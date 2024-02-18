<x-app-layout>
    <x-slot name=title>食事確認</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        kcal
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        <input type="time" id="meal_time" name="meal_time" required />
                    </th>
                </tr>
            </thead>
            @if (!empty($foods))
                <tbody>
                    @foreach ($foods as $food)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            </td>
                            <td class="px-6 py-4">
                                {{ $food->food_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $food->grams }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $food->calory }}
                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>
                    @endforeach
            @endif
            <tr>
                <td><button type="button" onclick="location.href='{{ route('meal_records.create') }}'">食品の追加</button>
                </td>
            </tr>
            <tr>
                <td><button type="button" onclick="location.href='{{ route('meal_records.index') }}'">完了</button>
            </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
