<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRegistrationMealRecord extends Model
{
    use HasFactory;

    protected $table = 'food_registration_meal_record';

    public $timestamps = false; //作成日、更新日を児童に更新しない
}
