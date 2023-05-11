<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('goal_id')->nullable();
            $table->bigInteger('active_id')->nullable();
            $table->bigInteger('diet_id')->nullable();
            $table->bigInteger('intensity_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('height')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('height_unit')->nullable();
            $table->string('weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->string('target_weight')->nullable();
            $table->string('target_weight_unit')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('image')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'00000000000',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
