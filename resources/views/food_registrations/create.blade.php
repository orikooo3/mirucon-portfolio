<x-app-layout>
    <div class="relative overflow-y-auto shadow-md sm:rounded-lg">
        <div class="flex flex-col items-center min-h-screen sm:justify-center sm:pt-0">
            <div
                class="flex justify-center my-10 max-w-xl lg:py-16 text-black-color bg-white-color dark:text-black-color dark:bg-white-color">
                <x-slot name=title>食品登録</x-slot>
                <section class="font-light mx-10 text-black-color dark:text-black-color">
                    <a href="#" onclick="history.back()" return false;><i class="fa-solid fa-x "></i></a>
                    <h2 class="flex justify-center items-center text-2xl mb-4">食品の登録</h2>
                    <form action="{{ route('food_registrations.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <x-text-label for="food_name" class="block mb-2 font-medium ">食品名<span
                                        class="text-alarm-color">(必須)</span></x-text-label>
                                <x-text-input type="text" name="food_name" id="food_name" class="w-full"
                                    autocomplete="off" required />
                            </div>
                            <div class="w-full">
                                <x-text-label for="grams" class="block mb-2 font-medium">グラム<span
                                        class="text-alarm-color">(必須)</span></x-text-label>
                                <x-text-input type="number" name="grams" id="grams" class="w-full" min="0"
                                    required />
                            </div>
                            <div class="w-full">
                                <x-text-label for="calorie" class="block mb-2 font-medium">カロリー<span
                                        class="text-alarm-color">(必須)</span></x-text-label>
                                <x-text-input type="number" name="calorie" id="calorie" class="w-full" min="0"
                                    required />
                            </div>
                            <div class="sm:col-span-2">
                                <x-text-label for="protein" class="block mb-2 font-medium">タンパク質</x-text-label>
                                <x-text-input type="number" name="protein" id="protein" min="0" step="0.1"
                                    class="w-full" />
                            </div>
                            <div div class="sm:col-span-2">
                                <x-text-label for="fat" class="block mb-2 font-medium">脂質</x-text-label>
                                <x-text-input type="number" name="fat" id="fat" min="0" step="0.1"
                                    class="w-full" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-text-label for="carbohydrate" class="block mb-2 font-medium">炭水化物</x-text-label>
                                <x-text-input type="number" name="carbohydrate" id="carbohydrate" min="0"
                                    step="0.1" class="w-full" />
                            </div>
                        </div>
                        <x-action-button type="submit"
                            class="flex-col  items-center w-full  mt-9 inline-flex px-5 py-2.5 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            登録
                        </x-action-button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
