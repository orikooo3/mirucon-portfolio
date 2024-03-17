<x-app-layout>
    <x-slot name=title>記録詳細</x-slot>
    <div class="relative overflow-y-auto shadow-md sm:rounded-lg">
        <div class="flex flex-col items-center min-h-screen sm:justify-center sm:pt-0">
            <table class="w-2/5 text-left text-lg font-light dark:text-explain-color mb-10">
                <thead class="dark:text-white-color dark:bg-sub-color">
                    <tr>
                        <th colspan="3" scope="col" class="px-6 py-4 ">
                            <div class="flex">
                                <div class="pt-0.5 "><a href="{{ route('meal_records.index') }}"><i
                                            class="fa-solid fa-x text-2xl"></i></a>
                                </div>
                                <div>
                                    <select name='meal_type' class="ml-6 pl-6 w-24 h-9 text-sm text-black-color">
                                        <option value='朝食'>朝食</option>
                                        <option value='昼食'>昼食</option>
                                        <option value='夜食'>夜食</option>
                                        <option value='間食'>間食</option>
                                    </select>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="pl-32 py-4 w-2/3">{{ $mealRecords->meal_calorie }}kcal</th>
                        <th scope="col" class="pl-12 py-3">
                            <input type="time" id="meal_time" name="meal_time"
                                class=" w-24 h-8 text-sm text-black-color" />
                        </th>
                    </tr>
                </thead>
                <tbody class="text-explain-color bg-white-color dark:text-explain-color dark:bg-white-color  ">
                    <tr class="text-center border-b">
                        <td colspan="5" class="py-2">
                            <x-action-button type="button"
                                class="text-sm dark:text-sub-color dark:bg-white-color hover:bg-white-dark-color w-36 h-7 "
                                onclick="location.href='{{ route('meal_records.add', ['meal_record_id' => $mealRecords->id]) }}'">食品の追加</x-action-button>
                        </td>
                    </tr>
                    @if (!empty($foods))
                        @foreach ($foods as $food)
                            <form method="post" action="{{ route('meal_records.destroy', ['food_id' => $food->id]) }}">
                                @csrf
                                @method('delete')
                                <tr class="border-b ">
                                    <td class="pl-6 py-4">
                                        <div class="dark:text-accent-color dark:hover:text-accent-dark-color">
                                            <button type="submit" class=""><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                    <td colspan="3" class="py-4 w-1/3 ">
                                        <div class="flex">
                                            <div><a class="dark:text-sub-color dark:hover:text-sub-dark-color"
                                                    href="{{ route('food_registrations.show', ['id' => $food->id]) }}">{{ $food->food_name }}</a>
                                            </div>
                                            <div class="text-base mt-0.5">{{ '(' . $food->grams . 'g)' }}</div>
                                        </div>
                                        <div class="text-sm text-gray-color">{{ $food->calorie }}kcal</div>
                                    </td>
                                    <td class="pl-20 py-4 w-1/3">
                                        <div class=" dark:bg-main-color text-center text-xs py-2 w-14 rounded-lg">
                                            {{ $food->quantity }}人前</div>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    @endif
                    <tr class="text-center border-b">
                        <td colspan="5" class="pb-4">
                            <x-action-button type="button" class="text-sm  mt-4 w-36 h-7"
                                onclick="location.href='{{ route('meal_records.index') }}'">完了</x-action-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
