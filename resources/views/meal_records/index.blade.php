<x-app-layout>
    <x-slot name=title>記録一覧</x-slot>
    {{-- ここに記録日と総カロリーを表示する --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex flex-col items-center min-h-screen sm:pt-20">
            <x-action-button type="button" class="mb-6 w-64 "
                onclick="location.href='{{ route('meal_records.create') }}'">
                <i class="fa-regular fa-plus mt-0.5 mr-1"></i>記録フォームを作成
            </x-action-button>
            @if ($today_record->isNotEmpty())
                @foreach ($today_record as $record)
                    <table class="w-2/5 text-left text-lg font-light dark:text-explain-color mb-10">
                        <form method="post"
                            action="{{ route('meal_records.record_destroy', ['record_id' => $record->id]) }}">
                            @csrf
                            @method('delete')
                            <thead class="dark:text-white-color dark:bg-sub-color">
                                <tr>
                                    <th class="pl-6">
                                        <div class="dark:text-accent-color dark:hover:text-accent-dark-color">
                                            <a href="{{ route('meal_records.show', $record->id) }}" class=""><i
                                                    class="fa-solid fa-pencil"></i></a>
                                        </div>
                                    </th>
                                    <th colspan="2" scope="col" class="pl-4 py-4 w-1/3">
                                        {{ $record->meal_type }}
                                        {{ substr($record->meal_time, 0, 5) }}</th>
                                    @if (!empty($record->meal_calorie))
                                        <th scope="col" class="pl-32 py-4 w-2/3">{{ $record->meal_calorie }}kcal</th>
                                    @else
                                        <th scope="col" class="pl-32 py-4 w-2/3"></th>
                                    @endif
                                    <th scope="col" class="px-6 py-3">
                                        <div class="dark:text-accent-color dark:hover:text-accent-dark-color">
                                            <button type="submit" class=""><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                        </form>
                        @if ($record->foodRegistrations->isNotEmpty())
                            @foreach ($record->foodRegistrations as $food)
                                <tbody class="">
                                    <tr
                                        class="{{ $loop->last ?: 'border-b' }} dark:bg-white-color dark:border-white-dark-color">
                                        <td colspan="4" class="px-6 py-3">
                                            <div class="flex">
                                                <div class="">{{ $food->food_name }}</div>
                                                <div class="text-sm mt-1">{{ '(' . $food->grams . 'g)' }}</div>
                                            </div>
                                            <div class="text-sm text-gray-color">{{ $food->calorie }}kcal</div>
                                        </td>
                                        <td class="pr-6 py-3">
                                            <div class="text-center text-sm text-gray-color">{{ $food->quantity }}人前
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else
                            <tbody class="">
                                <tr
                                    class="{{ $loop->last ?: 'border-b' }} text-base dark:bg-white-color dark:border-white-dark-color">
                                    <td colspan="5" class="px-6 py-4 text-clip text-center">{{ __('No Record') }}
                                    </td>
                                </tr>
                            </tbody>
                        @endif
                    </table>
                @endforeach
            @else
                <div class="">
                    <x-text-label class="text-3xl dark:text-gray-color">記録はありません</x-text-label>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
