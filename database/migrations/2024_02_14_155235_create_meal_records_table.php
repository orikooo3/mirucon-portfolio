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
            //外部キー制約
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('record_date')->nullable();
            $table->enum('meal_type', ['朝食', '昼食', '夜食', '間食'])->nullable();
            $table->time('meal_time')->nullable();
            $table->integer('total_calorie')->nullable();
            $table->integer('meal_calorie')->nullable();
            $table->string('food_name');
            $table->integer('grams');
            $table->integer('calory');
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
