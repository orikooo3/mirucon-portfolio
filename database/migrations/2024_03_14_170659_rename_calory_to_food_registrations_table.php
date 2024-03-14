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
        Schema::table('food_registrations', function (Blueprint $table) {
            $table->renameColumn('calory', 'calorie'); // カラム名を変更する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_registrations', function (Blueprint $table) {
            $table->renameColumn('calorie', 'calory'); // 元のカラム名に戻す
        });
    }
};
