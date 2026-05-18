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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id('lesson_id');
            $table->foreignId('course_id')->constrained('courses', 'course_id')->onDelete('cascade');
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('video_url')->nullable();
            $table->string('pdf_file')->nullable();
            $table->bigInteger('lesson_order')->default(1);
            $table->bigInteger('xp_reward')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
