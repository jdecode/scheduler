<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->index()
                ->nullable()
                ->default(null)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean('monday')->index()->nullable()->default(true);
            $table->boolean('tuesday')->index()->nullable()->default(true);
            $table->boolean('wednesday')->index()->nullable()->default(true);
            $table->boolean('thursday')->index()->nullable()->default(true);
            $table->boolean('friday')->index()->nullable()->default(true);
            $table->boolean('saturday')->index()->nullable()->default(true);
            $table->boolean('sunday')->index()->nullable()->default(true);
            $table->integer('slot_size')->nullable()->default(30)->comment('In minutes');
            $table->jsonb('breaks')->nullable()->default(null);
            $table->integer('break_size')->nullable()->default(null)->comment('In minutes');
            $table->timeTz('break_start_time')->nullable()->default(null);
            $table->uuid('uuid')->nullable()->default(null);
            $table->boolean('active')->nullable()->default(true);
            $table->timeTz('availability_starts')->nullable()->default(null);
            $table->timeTz('availability_ends')->nullable()->default(null);
            $table->string('random_string')->index()->nullable()->default(null);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
