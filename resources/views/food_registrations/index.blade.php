<x-app-layout>
    <x-slot name=title>食品一覧</x-slot>
    <div class="">
        <div class="h-screen flex flex-col items-center sm:pt-20">
            <table class="w-2/5 text-left rtl:text-right text-lg">
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
                    <tr class="text-center border-b">
                        <td colspan="4" class="py-4">
                            <x-action-button type="button"
                                class="text-sm dark:text-sub-color dark:bg-white-color hover:bg-white-dark-color w-36 h-7"
                                onclick="location.href='{{ route('food_registrations.create') }}'">食品を登録</x-action-button>
                        </td>
                    </tr>
                    @foreach ($foods as $food)
                        <form method="post" action="{{ route('food_registrations.destroy', $food) }}">
                            @csrf
                            @method('delete')
                            <tr class="text-base">
                                <td colspan="3" class="px-6 py-4">
                                    <div class="flex">
                                        <div class="dark:text-accent-color dark:hover:text-accent-dark-color">
                                            <button type="submit" class=""><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                        <div class="flex">
                                            <div><a class="dark:text-sub-color dark:hover:text-sub-dark-color"
                                                    href="{{ route('food_registrations.show', ['id' => $food->id]) }}">{{ $food->food_name }}</a>
                                            </div>
                                            <div class="text-base mt-0.5">{{ '(' . $food->grams . 'g)' }}</div>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-color">{{ $food->calorie }}kcal</div>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
