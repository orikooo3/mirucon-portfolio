<x-app-layout>
    <x-slot name=title>食品一覧</x-slot>
    <div class="">
        <div class="flex flex-col items-center min-h-screen sm:py-16">
            <table class="w-2/5 text-left rtl:text-right text-lg">
                <thead class="dark:text-white-color dark:bg-sub-color">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            <a href="#" onclick="history.back()" return false;><i
                                    class="fa-regular fa-less-than mr-2"></i>戻る</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-explain-color bg-white-color dark:text-explain-color dark:bg-white-color">
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
                            <tr
                                class="{{ $loop->last ?: 'border-b' }} dark:bg-white-color dark:border-white-dark-color">
                                <td colspan="3" class="px-6 py-4">
                                    <div class="flex">
                                        <div class="dark:text-accent-color dark:hover:text-accent-dark-color ">
                                            <button type="submit" class=""><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                        <div class="">
                                            <div>
                                                <a class="dark:text-sub-color dark:hover:text-sub-dark-color pl-6"
                                                    href="{{ route('food_registrations.show', ['id' => $food->id]) }}">{{ $food->food_name }}
                                                    <span class="text-sm">
                                                        {{ '(' . $food->grams . 'g)' }}
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="text-sm text-gray-color px-6">{{ $food->calorie }}kcal</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="">{{ $foods->links() }}</div>
</x-app-layout>
