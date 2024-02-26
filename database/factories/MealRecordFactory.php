<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MealRecord>
 */
class MealRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //'Y/m/d'
        return [
            'user_id' => User::inRandomOrder()->first()->id,             //リレーション定義
            'record_date' => fake()->date(),
            'meal_type' => $this->faker->randomElement($array = ['朝食', '昼食', '夜食', '間食']),
            'meal_time' => fake()->time('H:i'),
            'total_calorie' => fake()->randomNumber(4, true),
            'meal_calorie' => fake()->randomNumber(4, true),
            'created_at' => fake()->dateTimeBetween('-1 years'),
            'updated_at' => fake()->dateTimeBetween('-1 years'),
        ];
    }
}
