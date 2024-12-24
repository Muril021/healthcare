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
        Schema::create('available_times', function (Blueprint $table) {
            $table->id();

            $table->foreignId('specialty_id')
            ->references('id')
            ->on('specialties')
            ->onDelete('cascade');

            $table->foreignId('doctor_id')
            ->references('id')
            ->on('doctors')
            ->onDelete('cascade');

            $table->foreignId('schedule_id')
            ->references('id')
            ->on('schedules')
            ->onDelete('cascade');

            $table->date('date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_times');
    }
};
