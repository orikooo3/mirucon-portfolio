<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); #外部キー
            $table->foreignId('food_registration_id')->constrained()->onDelete('cascade'); #外部キー
            $table->date('record_date')->nullable();
            $table->enum('meal_type', ['朝食', '昼食', '夜食', '間食'])->default(['朝食']);
            $table->time('meal_time')->nullable();
            $table->integer('total_calorie');
            $table->integer('meal_calorie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_records');
    }
};
