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
        Schema::create('food_registration_meal_record', function (Blueprint $table) {
            $table->id();
            //外部キー制約
            $table->foreignId('food_registration_id')->constrained()->onDelete('cascade');
            //外部キー制約
            $table->foreignId('meal_record_id')->constrained()->onDelete('cascade');

            $table->integer('calorie');
            // $table->timestamps();
            //プライマリーキー
            // $table->primary(['meal_record_id', 'food_registration_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_registration_meal_record');
    }
};
