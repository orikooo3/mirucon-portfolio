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
            //外部キー制約
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('food_name');
            $table->integer('grams');
            $table->integer('calory');
            $table->integer('protein')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('carbohydrate')->nullable();
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
