<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->index()
                ->nullable()
                ->default(null)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('schedule_id')
                ->index()
                ->nullable()
                ->default(null)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamp('from')->index()->nullable()->default(null);
            $table->timestamp('to')->index()->nullable()->default(null);
            $table->boolean('active')->nullable()->default(true);
            $table->string('name')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->text('notes')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
