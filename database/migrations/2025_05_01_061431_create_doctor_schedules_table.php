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
        Schema::create('doctor_schedules', function (Blueprint $table) {
            $table->id('DoctorScheduleID');
            $table->unsignedBigInteger('DoctorID');
            $table->unsignedBigInteger('LocationID');
            $table->date('ScheduleDate');
            $table->time('StartTime');
            $table->time('EndTime');
            $table->enum('Status', ['Regular', 'Resident']);
            $table->timestamps();
        
            $table->foreign('DoctorID')->references('DoctorID')->on('doctors')->onDelete('cascade');
            $table->foreign('LocationID')->references('LocationID')->on('locations')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_schedules');
    }
};
