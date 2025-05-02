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
        Schema::create('inpatients', function (Blueprint $table) {
            $table->id('InpatientID');
            $table->unsignedBigInteger('PatientID');
            $table->unsignedBigInteger('DoctorID');
            $table->unsignedBigInteger('DepartmentID');
            $table->unsignedBigInteger('LocationID');
            $table->string('Availability', 10)->nullable();
            $table->text('MedicalRecord')->nullable();
            $table->timestamps();
        
            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
            $table->foreign('DoctorID')->references('DoctorID')->on('doctors')->onDelete('cascade');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('cascade');
            $table->foreign('LocationID')->references('LocationID')->on('locations')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inpatients');
    }
};
