<x-app-layout>
    <x-slot name=title>食品追加</x-slot>
    <div class="relative overflow-y-auto shadow-md sm:rounded-lg bg-bkg-color">
        <div class="flex flex-col items-center min-h-screen sm:justify-center sm:pt-0">
            <x-action-button type="button" class="mb-4"
                onclick="location.href='{{ route('food_registrations.index') }}'">食品一覧</x-action-button>
            <table class="w-2/5 text-sm text-left rtl:text-right ">
                <thead class="text-xs text-white-color bg-main-color dark:text-white-color dark:bg-main-color">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <a href="{{ route('meal_records.index') }}"><i class="fa-solid fa-x text-xl"></i></a>
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody
                    class="text-black-color bg-white-color border-b dark:text-black-colork dark:bg-white-color dark:border-explain-color-color">
                    @if (!empty($foods))
                        @foreach ($foods as $food)
                            <form method="post"
                                action="{{ route('meal_records.add_food', ['meal_record_id' => $mealRecords->id, 'food_id' => $food->id]) }}">
                                @csrf
                                {{-- <input type="hidden" name="id" value="{{ request()->query('id') }}"> --}}
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
                                        <button type="submit">登録</button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <x-action-button type="button" class="mt-4"
                onclick="location.href='{{ route('meal_records.show', $mealRecords) }}'">登録を確認</x-action-button>
            </form>
        </div>
    </div>
</x-app-layout>
