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
        Schema::create('food_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); #外部キー
            $table->foreignId('meal_record_id')->constrained()->onDelete('cascade'); #外部キー
            $table->integer('grams');
            $table->integer('calory');
            $table->integer('protein');
            $table->integer('fat');
            $table->integer('carbohydrate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_registrations');
    }
};
