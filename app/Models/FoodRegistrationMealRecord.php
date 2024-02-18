<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRegistrationMealRecord extends Model
{
    use HasFactory;

    public $timestamps = false; //作成日、更新日を児童に更新しない
}
