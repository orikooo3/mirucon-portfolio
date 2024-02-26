<x-app-layout>
    <x-slot name=title>記録フォーム作成</x-slot>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-bkg-color sm:justify-center sm:pt-0">
        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white-color shadow-md sm:max-w-md sm:rounded-xl">
            <a href="{{ route('meal_records.index') }}"><i class="fas fa-window-close"></i></a>
            <div class="flex justify-center mb-6 text-2xl max-w-screen font-semibold text-black-color-color">
                記録フォーム作成
            </div>
            <form method="post" action="{{ route('meal_records.create_form') }}">
                @csrf
                <div class="flex justify-center py-5">
                    <x-input-label for="email" :value="'食事の種類'" class="mt-7" />

                    <select name='meal_type'>
                        <option value='朝食'>朝食</option>
                        <option value='昼食'>昼食</option>
                        <option value='夜食'>夜食</option>
                        <option value='間食'>間食</option>
                    </select>
                </div>
                <div class="flex justify-center pb-5">
                    <x-input-label value="'時間の設定'" class="mt-7" />
                    <input type="time" name="meal_time" required />
                </div>
                <div class="flex justify-center items-center h-full">
                    <button type="submit" class="flex items-center justify-center">
                        登録
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
