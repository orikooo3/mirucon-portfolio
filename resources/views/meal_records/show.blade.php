<x-app-layout>
    <x-slot name=title>記録詳細</x-slot>
    <div class="relative overflow-y-auto shadow-md sm:rounded-lg bg-bkg-color">
        <div class="flex flex-col items-center min-h-screen sm:justify-center sm:pt-0">
            <div class="my-5">
                <x-action-button type="button"
                    onclick="location.href='{{ route('meal_records.add', ['meal_record_id' => $mealRecords->id]) }}'">食品の追加</x-action-button>
            </div>
            <table class="w-2/5 text-sm text-left">
                <thead class="text-xs text-white-color bg-main-color dark:text-white-color dark:bg-main-color">
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
                @if (!empty($foods))
                    @foreach ($foods as $food)
                        <tbody
                            class="text-black-color bg-white-color border-b dark:text-black-colork dark:bg-white-color dark:border-explain-color-color">
                            <form method="post" action="{{ route('meal_records.destroy', ['food_id' => $food->id]) }}">
                                @csrf
                                @method('delete')
                                <tr class="">
                                    <td scope="row" class="px-6 text-xl">
                                        {{ $food->food_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $food->grams }}g
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $food->calory }}kcal
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="submit" class="font-medium hover:underline"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            </form>
                    @endforeach
                @endif
                </form>
                </tbody>
            </table>
            <div class="flex flex-row my-5">
                <x-action-button type="button" class="mx-5"
                    onclick="location.href='{{ route('meal_records.index') }}'">完了</x-action-button>
            </div>
        </div>
    </div>
</x-app-layout>
