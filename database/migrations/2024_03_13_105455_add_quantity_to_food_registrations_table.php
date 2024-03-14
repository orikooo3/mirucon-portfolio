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
            $table->tinyInteger('quantity')->default(1); //カラムの追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_registrations', function (Blueprint $table) {
            $table->dropColumn('quantity'); // カラムの削除
        });
    }
};
