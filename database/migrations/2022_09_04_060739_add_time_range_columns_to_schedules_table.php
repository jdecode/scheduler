<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->timestamp('availability_starts')->index()->nullable()->default(null);
            $table->timestamp('availability_ends')->index()->nullable()->default(null);
        });
    }

    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('availability_starts');
            $table->dropColumn('availability_ends');
        });
    }
};
