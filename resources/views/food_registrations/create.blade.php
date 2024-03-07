<x-app-layout>
    <x-slot name=title>食品登録</x-slot>
    <section class="font-bold text-black-color dark:text-black-color">
        <div class=" py-8 px-4 mx-auto max-w-2xl lg:py-16 bg-white-color dark:bg-white-color">
            <h2 class="text-2xl mb-4">食品の登録</h2>
            <form action="{{ route('food_registrations.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <x-text-label for="food_name" class="block mb-2 font-medium"><x-slot name='min'>食品名<span
                                    class="text-alarm-color">(必須)</span></x-slot></x-text-label>
                        <x-text-input type="text" name="food_name" id="food_name" autocomplete="off" required />
                    </div>
                    <div class="w-full">
                        <x-text-label for="grams" class="block mb-2 font-medium"><x-slot name='min'>グラム<span
                                    class="text-alarm-color">(必須)</span></x-slot></x-text-label>
                        <x-text-input type="number" name="grams" id="grams" min="0" required />
                    </div>
                    <div class="w-full">
                        <x-text-label for="calory" class="block mb-2 font-medium"><x-slot name='min'>カロリー<span
                                    class="text-alarm-color">(必須)</span></x-slot></x-text-label>
                        <x-text-input type="number" name="calory" id="calory" min="0" required />
                    </div>
                    <div class="sm:col-span-2">
                        <x-text-label for="protein" class="block mb-2 font-medium"><x-slot
                                name='min'>タンパク質</x-slot></x-text-label>
                        <x-text-input type="number" name="protein" id="protein" min="0" />
                    </div>
                    <div div class="sm:col-span-2">
                        <x-text-label for="fat" class="block mb-2 font-medium"><x-slot
                                name='min'>脂質</x-slot></x-text-label>
                        <x-text-input type="number" name="fat" id="fat" min="0" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-text-label for="carbohydrate" class="block mb-2 font-medium"><x-slot
                                name='min'>炭水化物</x-slot></x-text-label>
                        <x-text-input type="number" name="carbohydrate" id="carbohydrate" min="0" />
                    </div>
                </div>
                <x-submit-button type="submit"
                    class="flex-col  items-center w-full  mt-9 inline-flex px-5 py-2.5 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    <x-slot name='normal'>登録</x-slot>
                </x-submit-button>
            </form>
        </div>
    </section>
</x-app-layout>
