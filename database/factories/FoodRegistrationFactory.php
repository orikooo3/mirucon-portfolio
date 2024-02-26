<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodRegistration>
 */
class FoodRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-1 years');

        return [
            'user_id' => User::inRandomOrder()->first()->id,             //リレーション定義
            'food_name' => fake()->word(),
            'grams' => fake()->randomNumber(3, true),
            'calory' => fake()->randomNumber(3, true),
            'protein' => fake()->randomNumber(3, true),
            'fat' => fake()->randomNumber(3, true),
            'carbohydrate' => fake()->randomNumber(3, true),
            'created_at' => fake()->dateTimeBetween('-1 years'),
            'updated_at' => fake()->dateTimeBetween('-1 years'),
        ];
    }
}
