<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'record_date',
        'meal_type',
        'meal_time',
        'total_calorie',
        'meal_calorie',
    ];

    // 多対多のリレーション
    public function foodregistrations()
    {
        return $this->belongsToMany(FoodRegistration::class);
    }

    // 一対多のリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
