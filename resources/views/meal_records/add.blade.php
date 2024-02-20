<x-app-layout>
    <x-slot name=title>食品追加</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <button type="button" onclick="location.href='{{ route('food_registrations.index') }}'">食品一覧</button>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        kcal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        グラム
                    </th>
                    <th scope="col" class="px-6 py-3">
                        カロリー
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            @if (!empty($foods))
                @foreach ($foods as $food)
                    <form method="post" action="{{ route('meal_records.add_food') }}">
                        @csrf
                        <input type="hidden" name="food_id" value="{{ $food->id }}">
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
                                <button type="submit">登録</button>
                            </td>
                        </tr>
                    </form>
                @endforeach
            @endif
            <tr>
                <td>
                    {{-- <button type="button" onclick="location.href='{{ route('meal_records.show') }}'">登録を確認</button> --}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
