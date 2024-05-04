<x-app-layout>
    <x-slot name="title">食品詳細</x-slot>
    <div class="flex flex-col items-center min-h-screen py-8 sm:py-20">
        <div class="bg-white shadow-xl rounded-lg p-6 w-full max-w-lg">
            <div class="">
                <div class="text-center">
                    <p class="text-base font-semibold">{{ $food->food_name }}
                    <p>
                </div>
                <div class="text-center my-2">
                    <p class="text-xl">{{ $food->calorie }}<span class="text-sm">kcal</span></p>
                </div>
                <div class="c text-center">
                    <p class="text-base">{{ $food->grams }}<span class="text-sm">g</span></p>
                </div>
                <div class="col-span-2">
                    <hr class="my-4">
                </div>
                <div class="text-left flex flex-col items-center ">
                    <div class="">
                        <p>タンパク質: {{ $food->protein }}<span class="text-sm">g</span></p>
                    </div>
                    <div class="">
                        <p>脂質: {{ $food->fat }}<span class="text-sm">g</span></p>
                    </div>
                    <div class="">
                        <p>炭水化物: {{ $food->carbohydrate }}<span class="text-sm">g</span></p>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-center">
                <x-action-button class="text-sm w-36 h-7" onclick="location.href='{{ route('food_registrations.edit', ['id' => $food->id]) }}'">
                    編集
                </x-action-button>
            </div>
        </div>
    </div>
</x-app-layout>
