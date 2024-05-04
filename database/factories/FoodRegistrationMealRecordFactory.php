<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MealRecord;
use App\Models\FoodRegistration;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FoodRegistrationMealRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'meal_record_id' => function () {
                return MealRecord::inRandomOrder()->first()->id;
            },
            'food_registration_id' => function () {
                return FoodRegistration::inRandomOrder()->first()->id;
            },
            'calorie' => fake()->randomNumber(3, true),
        ];
    }
}
