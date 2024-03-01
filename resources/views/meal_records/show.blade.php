<x-app-layout>
    <x-slot name=title>記録詳細</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        食品名
                    </th>
                    <th scope="col" class="px-6 py-3">
                        g
                    </th>
                    <th scope="col" class="px-6 py-3">
                        kcal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <input type="time" id="meal_time" name="meal_time" required />
                    </th>
                </tr>
            </thead>
            @if (!empty($foods))
                @foreach ($foods as $food)
                    <tbody>
                        <form method="post"
                            action="{{ route('meal_records.destroy', ['food_id' => $food->id]) }}">
                            @csrf
                            @method('delete')
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $food->food_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $food->grams }}g
                                </td>
                                <td class="px-6 py-4">
                                    {{ $food->calory }}kcal
                                </td>
                                <td class="px-6 py-4">
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                            class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </form>
                @endforeach
            @endif
            <tr>
                <td>
                    <button type="button" onclick="location.href='{{ route('meal_records.add', ['meal_record_id' => $mealRecords->id]) }}'">食品の追加</button>
                </td>
            </tr>
                <tr>
                    <td>
                       <button type="button" onclick="location.href='{{ route('meal_records.index') }}'">完了</button>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
</x-app-layout>
