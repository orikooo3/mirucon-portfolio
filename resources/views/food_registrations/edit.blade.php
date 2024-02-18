<x-app-layout>
    <x-slot name=title>食品登録</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
            <form action="{{ route('food_registrations.update', ['id' => $food->id]) }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">食品名<span
                                class="text-alarm-color">(必須)</span></label>
                        <input type="text" name="food_name" id="food_name" value="{{ $food->food_name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type product name" required="">
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">グラム数<span
                                class="text-alarm-color">(必須)</span></label>
                        <input type="number" name="grams" id="grams" value="{{ $food->grams }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Product brand" required="">
                    </div>
                    <div class="w-full">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">カロリー<span
                                class="text-alarm-color">(必須)</span></label>
                        <input type="number" name="calory" id="calory" value="{{ $food->calory }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$2999" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="price"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">タンパク質</label>
                        <input type="number" name="protein" id="protein" value="{{ $food->protein }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$2999">
                    </div>
                    <div div class="sm:col-span-2">
                        <label for="item-weight"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">脂質</label>
                        <input type="number" name="fat" id="fat" value="{{ $food->fat }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="12">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">炭水化物</label>
                        <input type="number" name="carbohydrate" id="carbohydrate" value="{{ $food->carbohydrate }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$2999">
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    更新
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
