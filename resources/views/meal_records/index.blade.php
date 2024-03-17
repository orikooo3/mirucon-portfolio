<x-app-layout>
    <x-slot name=title>記録一覧</x-slot>
    {{-- ここに記録日と総カロリーを表示する --}}
    <div class="relative overflow-y-auto">
        <div class="flex flex-col items-center sm:justify-center sm:pt-0">
            <x-action-button type="button" class="my-8 w-64 "
                onclick="location.href='{{ route('meal_records.create') }}'">
                <i class="fa-regular fa-plus mt-0.5 mr-1"></i>記録フォームを作成
            </x-action-button>
            @if (!empty($b))
                @foreach ($b as $record)
                    <table class="w-2/5 text-sm text-left mb-10">
                        <form method="post"
                            action="{{ route('meal_records.record_destroy', ['record_id' => $record->id]) }}">
                            @csrf
                            @method('delete')
                            <thead class="text-xs text-white-color bg-sub-color dark:text-white-color dark:bg-sub-color">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        {{-- 戻るボタン --}}
                                        <a href="{{ route('dashboard') }}" class="mr-9"><i
                                                class="fa-regular fa-less-than"></i></a>
                                        {{-- 食事のタイプ --}}
                                        {{ $record->meal_type }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{-- 食事時間 --}}
                                        {{ substr($record->meal_time, 0, 5) }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{-- 記録詳細画面遷移 --}}
                                        <a href="{{ route('meal_records.show', $record->id) }}"
                                            class="hover:text-white-dark-color mr-4"><i
                                                class="fa-solid fa-pencil"></i></a>
                                        {{-- 記録削除ボタン --}}
                                        <button type="submit" class="font-medium hover:text-white-dark-color"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </th>
                                </tr>
                            </thead>
                        </form>
                        @if (!empty($record))
                            @foreach ($record->foodRegistrations as $food)
                                <tbody
                                    class="text-black-color bg-white-color border-b dark:text-black-colork dark:bg-white-color dark:border-explain-color-color">
                                    <tr
                                        class="text-black-color bg-white-color border-b dark:text-black-color dark:bg-white-color dark:border-explain-color-color">
                                        <td colspan="2" scope="row" class="px-6 py-4 text-xl">
                                            <div class="flex">
                                                <div class="text-lg">{{ $food->food_name }}</div>
                                                <div class="text-base mt-0.5">{{ '(' . $food->grams . 'g)' }}</div>
                                            </div>
                                            <div class="text-xs text-explain-color">{{ $food->calorie }}kcal</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class=" text-center">{{$food->quantity}}人前</div>
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
