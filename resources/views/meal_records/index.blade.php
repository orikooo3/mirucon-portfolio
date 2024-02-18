<x-app-layout>
    <x-slot name=title>本日の記録</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <a href="{{ route('meal_records.create') }}"><i class="fa-solid fa-circle-plus"></i></a>
        @if (!@empty($myMealRecords))
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">
                            グラム
                        </th>
                        <th scope="col" class="px-6 py-3">
                            カロリー
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="{{ route('meal_records.show') }}"><i class="fa-solid fa-pencil"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
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
                            <td class="px-6 py-4">
                                <a href="{{ route('food_registrations.destroy', ['id' => $food->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
