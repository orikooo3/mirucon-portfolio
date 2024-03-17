<x-app-layout>
    <x-slot name=title>記録詳細</x-slot>
    <div class="relative overflow-y-auto shadow-md sm:rounded-lg">
        <div class="flex flex-col items-center min-h-screen sm:justify-center sm:pt-0">
            <table class="w-2/5 text-sm text-left">
                <thead class="text-xs text-white-color bg-sub-color dark:text-white-color dark:bg-sub-color">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <a href="{{ route('meal_records.index') }}"><i class="fa-solid fa-x text-xl"></i></a>
                            <select name='meal_type' class="ml-9 w-24 h-9 text-sm text-black-color">
                                <option value='朝食'>朝食</option>
                                <option value='昼食'>昼食</option>
                                <option value='夜食'>夜食</option>
                                <option value='間食'>間食</option>
                            </select>
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">
                            <input type="time" id="meal_time" name="meal_time"
                                class=" w-24 h-8 text-sm text-black-color" />
                        </th>
                    </tr>
                </thead>
                <tbody class="text-explain-color bg-white-color dark:text-explain-color dark:bg-white-color  ">
                    @if (!empty($foods))
                        @foreach ($foods as $food)
                            <form method="post" action="{{ route('meal_records.destroy', ['food_id' => $food->id]) }}">
                                @csrf
                                @method('delete')
                                <tr class="text-center border-b">
                                    <td colspan="4" class="py-2">
                                        <x-action-button type="button" class="text-sm dark:text-sub-color dark:bg-white-color hover:bg-white-dark-color w-36 h-7 "
                                            onclick="location.href='{{ route('meal_records.add', ['meal_record_id' => $mealRecords->id]) }}'">食品の追加</x-action-button>
                                    </td>
                                </tr>
                                <tr class="border-b ">
                                    <td scope="row" class="px-6 text-xl">
                                        <div class="flex">
                                            <div class="text-lg">{{ $food->food_name }}</div>
                                            <div class="text-base mt-0.5">{{ '(' . $food->grams . 'g)' }}</div>
                                        </div>
                                        <div class="text-sm text-gray-color">{{ $food->calorie }}kcal</div>
                                    </td>
                                    <td class="px-6 py-4">

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="dark:bg-main-color text-center">{{$food->quantity}}人前</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="submit" class="font-medium hover:underline"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    @endif
                    <tr class="text-center border-b">
                        <td colspan="4" class="pb-4">
                            <x-action-button type="button" class="text-sm  mt-4 w-36 h-7"
                                onclick="location.href='{{ route('meal_records.index') }}'">完了</x-action-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
