<x-app-layout>
    <x-slot name=title>食品追加</x-slot>
    <div class="relative overflow-y-auto shadow-md sm:rounded-lg">
        <div class="flex flex-col items-center min-h-screen sm:pt-20">
            <table class="w-2/5 text-sm text-left rtl:text-right ">
                <thead class="text-xs text-white-color bg-sub-color dark:text-white-color dark:bg-sub-color">
                    <tr>
                        <th colspan="4" scope="col" class="px-6 py-3">
                            <a href="{{ route('meal_records.index') }}"><i class="fa-solid fa-x text-2xl"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-black-color bg-white-color  dark:text-black-colork dark:bg-white-color ">
                    <tr class="text-center border-b">
                        <td colspan="4" class="py-4">
                            <x-action-button type="button"
                                class="text-sm dark:text-sub-color dark:bg-white-color hover:bg-white-dark-color w-36 h-7"
                                onclick="location.href='{{ route('food_registrations.index') }}'">食品一覧</x-action-button>
                        </td>
                    </tr>
                    @if (!empty($foods))
                        @foreach ($foods as $food)
                            <form method="post"
                                action="{{ route('meal_records.add_food', ['meal_record_id' => $mealRecords->id, 'food_id' => $food->id]) }}">
                                @csrf
                                <tr class="border-b">
                                    <td scope="row" class="px-6 text-xl w-2/3">
                                        <div class="flex">
                                            <div class="text-lg">{{ $food->food_name }}</div>
                                            <div class="text-base mt-0.5">{{ '(' . $food->grams . 'g)' }}</div>
                                        </div>
                                        <div class="text-sm text-gray-color">{{ $food->calorie }}kcal</div>
                                    </td>
                                    <td class="pl-28 py-4 w-1/3">
                                        <div class="text-center text-xs py-2 w-14 rounded-lg dark:text-white-color dark:bg-sub-color dark:hover:bg-sub-dark-color">
                                            <button type="submit">登録</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    @endif
                    <tr class="text-center">
                        <td colspan="4" class="pb-4 ">
                            <x-action-button type="button" class="text-sm  mt-4 w-36 h-7"
                                onclick="location.href='{{ route('meal_records.show', $mealRecords) }}'">登録を確認</x-action-button>
                        </td>
                    </tr>
                </tbody>
            </table>

            </form>
        </div>
    </div>
</x-app-layout>
