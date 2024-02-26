<x-app-layout>
    <x-slot name=title>食品追加</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex flex-col items-center min-h-screen pt-6 bg-bkg-color sm:justify-center sm:pt-0">

            <button type="button" onclick="location.href='{{ route('food_registrations.index') }}'">食品一覧</button>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">
                            g
                        </th>
                        <th scope="col" class="px-6 py-3">
                            kcal
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($foods))
                        @foreach ($foods as $food)
                            <form method="post"
                                action="{{ route('meal_records.add_food', ['meal_record_id' => $mealRecords->id, 'food_id' => $food->id]) }}">
                                @csrf
                                {{-- <input type="hidden" name="id" value="{{ request()->query('id') }}"> --}}
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
                                        <button type="submit">登録</button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <button type="button"
                onclick="location.href='{{ route('meal_records.show', $mealRecords) }}'">登録を確認</button>
            </form>
        </div>
    </div>
</x-app-layout>
