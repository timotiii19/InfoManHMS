<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('AppointmentID');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('status')->default('Scheduled');
            $table->text('notes')->nullable();
            $table->timestamps();
        
            $table->foreign('patient_id')->references('PatientID')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('DoctorID')->on('doctors')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
