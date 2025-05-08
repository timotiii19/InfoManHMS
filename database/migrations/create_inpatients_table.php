<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inpatients', function (Blueprint $table) {
            $table->id('InpatientID');
            $table->unsignedBigInteger('PatientID'); // Foreign key to patients table
            $table->unsignedBigInteger('DoctorID');
            $table->unsignedBigInteger('DepartmentID');
            $table->unsignedBigInteger('LocationID'); // Added this based on your model
            $table->string('Availability', 50); // Added this based on your model
            $table->text('MedicalRecord'); // Added this based on your model
            $table->dateTime('AdmissionDate');
            $table->dateTime('DischargeDate');
            $table->text('Diagnosis');
            $table->timestamps();
        
            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
            $table->foreign('DoctorID')->references('DoctorID')->on('doctors')->onDelete('cascade');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('cascade');
            $table->foreign('LocationID')->references('LocationID')->on('locations')->onDelete('cascade'); // Foreign key for LocationID
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inpatients');
    }
};
