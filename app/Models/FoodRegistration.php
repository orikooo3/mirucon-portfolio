<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_name',
        'grams',
        'calory',
        'protein',
        'fat',
        'carbohydrate',
    ];
}
