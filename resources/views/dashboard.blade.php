<x-app-layout>
    <x-slot name=title>本日の記録</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <button type="button" onclick="location.href='{{ route('meal_records.index') }}'">本日の記録を追加</button>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        食品名
                    </th>
                    <th scope="col" class="px-6 py-3">
                        グラム数
                    </th>
                    <th scope="col" class="px-6 py-3">
                        カロリー
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    </td>
                    <td class="px-6 py-4">

                    </td>
                    <td class="px-6 py-4">

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
