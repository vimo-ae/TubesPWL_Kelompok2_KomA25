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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'instructor', 'student'])->default('student');
            $table->boolean('is_verified')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('last_login')->nullable();
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
