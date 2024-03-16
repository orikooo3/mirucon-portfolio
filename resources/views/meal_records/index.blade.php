<x-app-layout>
    <x-slot name=title>記録一覧</x-slot>
    {{-- ここに記録日と総カロリーを表示する --}}
    <div class="relative overflow-y-auto shadow-md sm:rounded-lg">
        <div class="flex flex-col items-center min-h-screen sm:justify-center sm:pt-0">
            <x-action-button type="button" class="my-5 w-64 " onclick="location.href='{{ route('meal_records.create') }}'">
                <i class="fa-regular fa-plus mt-0.5 mr-1"></i>記録フォームを作成
            </x-action-button>
            @if (!empty($b))
                @foreach ($b as $record)
                    <table class="w-2/5 text-sm text-left mb-10">
                        <form method="post"
                            action="{{ route('meal_records.record_destroy', ['record_id' => $record->id]) }}">
                            @csrf
                            @method('delete')
                            <thead
                                class="text-xs text-white-color bg-sub-color dark:text-white-color dark:bg-sub-color">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <a href="{{ route('dashboard') }}" class="mr-9"><i class="fa-regular fa-less-than"></i>戻る</a>{{ $record->meal_type }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ $record->meal_time }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <a href="{{ route('meal_records.show', $record->id) }}"><i
                                                class="fa-solid fa-pencil"></i></a>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <button type="submit" class="font-medium hover:underline"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </th>
                                </tr>
                            </thead>
                        </form>
                        @if (!empty($record))
                            @foreach ($record->foodRegistrations as $food)
                                <tbody
                                    class="text-black-color bg-white-color border-b dark:text-black-colork dark:bg-white-color dark:border-explain-color-color">
                                    <tr class="">
                                        <td scope="row" class="px-6 text-xl">
                                            {{ $food->food_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $food->grams }}g
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $food->calorie }}kcal
                                        </td>
                                        <td class="px-6 py-4">

                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                            {{-- 食品が追加されていないときはelseifで「食品はまだ記録されていません」と表示する --}}
                        @endif
                    </table>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
