<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_name',
        'grams',
        'calory',
        'protein',
        'fat',
        'carbohydrate',
    ];

    // 多対多のリレーション
    public function mealRecords()
    {
        return $this->belongsToMany(MealRecord::class);
    }

    // 一対多のリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
