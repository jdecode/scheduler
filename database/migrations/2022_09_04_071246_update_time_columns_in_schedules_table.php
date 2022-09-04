<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->time('break_start_time')->nullable()->default(null)->change();
            $table->time('availability_starts')->nullable()->default(null)->change();
            $table->time('availability_ends')->nullable()->default(null)->change();
        });
    }

    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->timestamp('break_start_time')->nullable()->default(null)->change();
            $table->timestamp('availability_starts')->nullable()->default(null)->change();
            $table->timestamp('availability_ends')->nullable()->default(null)->change();
        });
    }
};
