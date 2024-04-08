<?php

namespace Database\Seeders;

use App\Models\FoodRegistrationMealRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodRegistrationMealRecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodRegistrationMealRecord::factory(5)->create();
    }
}
