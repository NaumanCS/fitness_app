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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('food_id')->nullable();
            $table->float('eaten_calories')->nullable();
            $table->float('remaining_calories')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('food_id')->nullable();
            $table->dropColumn('eaten_calories');
            $table->dropColumn('remaining_calories');
        });
    }
};
