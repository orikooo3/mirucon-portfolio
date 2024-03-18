<x-app-layout>
    <x-slot name="title">記録詳細</x-slot>
    <div class="">
        <div class="flex flex-col items-center min-h-screen sm:py-20">
            <table class="w-2/5 text-left text-lg font-light dark:text-explain-color mb-10">

                <thead class="dark:text-white-color dark:bg-sub-color">
                    <form id="update" method="post"
                        action="{{ route('meal_records.update', ['id' => $meal_records->id]) }}">
                        @csrf
                        @method('patch')
                        <tr>
                            <th colspan="3" scope="col" class="px-6 py-4 ">
                                <div class="flex">
                                    <div class="pt-0.5"><a href="{{ route('meal_records.index') }}"><i
                                                class="fa-solid fa-x text-2xl"></i></a></div>

                                    <div>
                                        <select name='meal_type' class="ml-6 pl-6 w-24 h-9 text-sm text-black-color">
                                            <option
                                                value='朝食'{{ $meal_records->meal_type == '朝食' ? 'selected' : '' }}>
                                                朝食
                                            </option>
                                            <option
                                                value='昼食'{{ $meal_records->meal_type == '昼食' ? 'selected' : '' }}>
                                                昼食
                                            </option>
                                            <option
                                                value='夜食'{{ $meal_records->meal_type == '夜食' ? 'selected' : '' }}>
                                                夜食
                                            </option>
                                            <option
                                                value='間食'{{ $meal_records->meal_type == '間食' ? 'selected' : '' }}>
                                                間食
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </th>
                            @if (!empty($meal_records->meal_calorie))
                                <th scope="col" class="pl-32 py-4 w-2/3">{{ $meal_records->meal_calorie }}kcal</th>
                            @else
                                <th scope="col" class="pl-32 py-4 w-2/3"></th>
                            @endif
                            <th scope="col" class="pl-12 py-3">
                                <x-text-input type="time" id="meal_time" name="meal_time"
                                    value="{{ $meal_records->meal_time }}" class="w-24 h-8 text-sm text-black-color" />
                            </th>
                        </tr>
                    </form>
                </thead>
                <tbody class="text-explain-color bg-white-color dark:text-explain-color dark:bg-white-color">
                    <tr class="text-center border-b">
                        <td colspan="5" class="py-4">
                            <x-action-button type="button"
                                class="text-sm dark:text-sub-color dark:bg-white-color hover:bg-white-dark-color w-36 h-7 "
                                onclick="location.href='{{ route('meal_records.add', ['meal_record_id' => $meal_records->id]) }}'">食品の追加</x-action-button>
                        </td>
                    </tr>
                    @if (!empty($foods))
                        @foreach ($foods as $food)
                            <tr class="border-b ">
                                <td colspan="4" class="px-6 py-4">
                                    <div class="flex">
                                        <div class="dark:text-accent-color dark:hover:text-accent-dark-color ">
                                            <form method="post" id="delete"
                                                action="{{ route('meal_records.destroy', ['food_id' => $food->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" form="delete"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>
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
                                <td class="pl-20 py-4 w-1/3">
                                    <livewire:calculate-modal :id="$food->id" />
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr class="text-center border-b">
                        <td colspan="5" class="pb-4">
                            <x-action-button form="update" type="submit" class="text-sm mt-4 w-36 h-7">
                                完了
                            </x-action-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
