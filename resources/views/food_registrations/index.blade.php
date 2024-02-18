<x-app-layout>
    <x-slot name=title>食品一覧</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                <tr>
                    <th scope="col" class="px-6 py-3">
                        食品名
                    </th>
                    <th scope="col" class="px-6 py-3">
                        グラム
                    </th>
                    <th scope="col" class="px-6 py-3">
                        カロリー
                    </th>
                    <th scope="col" class="px-6 py-3">
                        タンパク質
                    </th>
                    <th scope="col" class="px-6 py-3">
                        脂質
                    </th>
                    <th scope="col" class="px-6 py-3">
                        炭水化物
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <button type="button"
                            onclick="location.href='{{ route('food_registrations.create') }}'">食品を登録</button>
                    </td>
                </tr>
                @foreach ($foods as $food)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a
                                href="{{ route('food_registrations.edit', ['id' => $food->id]) }}">{{ $food->food_name }}</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $food->grams }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $food->calory }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $food->protein }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $food->fat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $food->carbohydrate }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('food_registrations.destroy', ['id' => $food->id]) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
