<x-app-layout>
    <x-slot name=title>食品詳細</x-slot>
    <div class="h-screen w-screen flex justify-center pt-32">
        <div class="bg-white-color h-40 rounded-lg">
            <div class="grid ">
                {{ $food->food_name }}
                {{ $food->grams }}
                {{ $food->calorie }}
                {{ $food->protein }}
                {{ $food->fat }}
                {{ $food->carbohydrate }}
                <x-action-button onclick="location.href='{{route('food_registrations.edit', ['id' => $food->id])}}'">編集</x-action-button>
            </div>
        </div>
    </div>
</x-app-layout>
