<x-app-layout>
    <x-slot name=title>食品一覧</x-slot>
    <div class="relative overflow-y-auto shadow-md sm:rounded-lg bg-bkg-color">
        <div class="flex flex-col items-center min-h-screen sm:justify-center sm:pt-0">
            <div class="my-5">
                <x-action-button type="button"
                    onclick="location.href='{{ route('food_registrations.create') }}'">食品を登録</x-action-button>
            </div>
            <table class="w-3/5 text-sm text-left rtl:text-right">
                <thead class="text-xs text-white-color bg-main-color dark:text-white-color dark:bg-main-color">

                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <a href="#" onclick="history.back()" return false;><i
                                    class="fa-regular fa-less-than mr-2"></i>戻る</a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            グラム
                        </th>
                        <th scope="col" class="px-6 py-3">
                            カロリー
                        </th>
                        <th scope="col" class="px-6 py-3">
                            タンパク質
                        </th>
                        <th scope="col" class="px-6 py-3">
                            脂質
                        </th>
                        <th scope="col" class="px-6 py-3">
                            炭水化物
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
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
                                    <a href="{{ route('food_registrations.edit', $food) }}">{{ $food->food_name }}</a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $food->grams }}g
                                </td>
                                <td class="px-6 py-4">
                                    {{ $food->calory }}kcal
                                </td>
                                <td class="px-6 py-4">
                                    @if (!isset($food->protein))
                                        未入力
                                    @else
                                        {{ $food->protein }}kcal
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if (!isset($food->protein))
                                        未入力
                                    @else
                                        {{ $food->fat }}kcal
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if (!isset($food->protein))
                                        未入力
                                    @else
                                        {{ $food->carbohydrate }}kcal
                                    @endif
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
