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
        if (!Schema::hasColumn('lessons', 'is_published')) {

            Schema::table('lessons', function (Blueprint $table) {
                $table->boolean('is_published')
                    ->default(false)
                    ->after('title');
            });

        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('lessons', 'is_published')) {

            Schema::table('lessons', function (Blueprint $table) {
                $table->dropColumn('is_published');
            });

        }
    }
};
