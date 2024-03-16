<x-app-layout>
    <x-slot name=title>食品一覧</x-slot>
    <div class="relative overflow-y-auto ">
        <div class="flex flex-col items-center  sm:justify-center sm:pt-10">
            <table class="w-2/5 text-sm text-left rtl:text-right">
                <div class="my-5">
                    <x-action-button type="button" class=""
                        onclick="location.href='{{ route('food_registrations.create') }}'">食品を登録</x-action-button>
                </div>
                <thead class="text-xs text-white-color bg-sub-color dark:text-white-color dark:bg-sub-color">

                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <a href="#" onclick="history.back()" return false;><i
                                    class="fa-regular fa-less-than mr-2"></i>戻る</a>
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody
                    class="text-black-color bg-white-color border-b dark:text-black-colork dark:bg-white-color dark:border-explain-color-color">
                    @foreach ($foods as $food)
                        <form method="post" action="{{ route('food_registrations.destroy', $food) }}">
                            @csrf
                            @method('delete')
                            <tr class="">
                                <td scope="row" class="px-6 text-xl">
                                    <a href="{{ route('food_registrations.show', ['id' => $food->id]) }}">{{ $food->food_name }}</a>
                                    {{ $food->calorie }}kcal
                                    {{ $food->grams }}g
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="font-medium hover:underline"><i
                                            class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
