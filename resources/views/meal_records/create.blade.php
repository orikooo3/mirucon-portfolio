<x-app-layout>
    <x-slot name=title>記録フォーム作成</x-slot>
    {{$date}}
    <div
        class="flex flex-col items-center min-h-screen sm:pt-20">
        <div class="w-full px-6 py-4 mt-6 bg-white-color shadow-md sm:max-w-md sm:rounded-xl">
            <a href="{{ route('meal_records.index') }}" class="text-2xl"><i class="fa-solid fa-x"></i></a>
            <div class="flex justify-center text-2xl -mt-7 max-w-screen font-semibold">
                記録フォーム作成
            </div>
            <form method="post" action="{{ route('meal_records.create_form') }}">
                @csrf
                <div>
                    <input type="hidden" name="record_date" value="{{ $date }}">
                </div>
                <div class="flex items-center justify-center my-7">
                    <div class="mx-4">
                        <x-input-label for="email" :value="'食事の種類'" class="mt-7" />

                        <select name='meal_type' class="w-28">
                            <option value='朝食'>朝食</option>
                            <option value='昼食'>昼食</option>
                            <option value='夜食'>夜食</option>
                            <option value='間食'>間食</option>
                        </select>
                    </div>
                    <div class="mx-4">
                        <x-input-label :value="'食事時間'" class="mt-7" />
                        <input type="time" name="meal_time" required class="w-28" />
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <x-action-button type="submit" class="text-sm w-64 mb-4">
                        登録
                    </x-action-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
