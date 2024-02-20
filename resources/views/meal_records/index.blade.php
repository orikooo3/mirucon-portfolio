<x-app-layout>
    <x-slot name=title>記録一覧</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <a href="{{ route('meal_records.create') }}"><i class="fa-solid fa-circle-plus">記録フォーム作成</i></a>
        @if (!empty($createForm))
            @foreach ($createForm as $form)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ $form->meal_type }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $form->meal_time }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $form->meal_calory }}kcal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a href="{{ route('meal_records.show', $form) }}"><i class="fa-solid fa-pencil"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        @endif
    </div>
</x-app-layout>
