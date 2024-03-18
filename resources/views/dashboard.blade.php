<x-app-layout>
    {{-- カレンダー --}}
    <x-calendar />
    <div class="">
        <div class="flex flex-col items-center min-h-screen">
            {{-- 本日の記録 --}}
            <x-slot name=title>本日の記録</x-slot>
            <x-action-button type="button" class="mt-16 mb-6 w-52"
                onclick="location.href='{{ route('meal_records.index') }}'">
                <i class="fa-regular fa-plus my-auto mr-1"></i>本日の記録を追加
            </x-action-button>
            @if (!empty($b))
                @foreach ($b as $record)
                    <table class="w-2/5 text-left text-lg font-light dark:text-explain-color mb-10">
                        <thead class="dark:text-white-color dark:bg-sub-color">
                            <tr class="">
                                <th colspan="2" scope="col" class="pl-6 py-4 w-1/3">
                                    {{ $record->meal_type }}
                                    {{ substr($record->meal_time, 0, 5) }}</th>
                                @if (!empty($record->meal_calorie))
                                    <th scope="col" class="pl-32 py-4 w-2/3">{{ $record->meal_calorie }}kcal</th>
                                @else <th scope="col" class="pl-32 py-4 w-2/3"></th>
                                @endif
                            </tr>
                        </thead>
                        {{-- collectionだから!empty()ではなくisNotEmptyを使う --}}
                        @if ($record->foodRegistrations->isNotEmpty())
                            @foreach ($record->foodRegistrations as $food)
                                <tbody class="">
                                    <tr
                                        class="{{ $loop->last ?: 'border-b' }} dark:bg-white-color dark:border-white-dark-color">
                                        <td colspan="2" class="px-6 py-3 w-2/3">
                                            <div class="flex">
                                                <div class="text-base">{{ $food->food_name }}</div>
                                                <div class="text-base">{{ '(' . $food->grams . 'g)' }}</div>
                                            </div>
                                            <div class="text-sm text-gray-color">{{ $food->calorie }}kcal</div>
                                        </td>
                                        <td class="pl-60 py-3 w-1/3">
                                            <div class="text-center text-sm text-gray-color ml-20">
                                                {{ $food->quantity }}人前</div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else
                            <tbody class="">
                                <tr
                                    class="{{ $loop->last ?: 'border-b' }} text-base dark:bg-white-color dark:border-white-dark-color">
                                    <td colspan="3" class="px-6 py-4 text-clip text-center">{{ __('No Record') }}
                                    </td>
                                </tr>
                            </tbody>
                        @endif
                    </table>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
