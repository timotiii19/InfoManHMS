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
        Schema::create('patient_medications', function (Blueprint $table) {
            $table->id('PatientMedicationID');
            $table->unsignedBigInteger('PatientID');
            $table->unsignedBigInteger('MedicineID');
            $table->unsignedBigInteger('DoctorID');
            $table->string('Dosage', 50);
            $table->string('Frequency', 50);
            $table->date('StartDate');
            $table->date('EndDate');
            $table->timestamps();
        
            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
            $table->foreign('MedicineID')->references('MedicineID')->on('pharmacy')->onDelete('cascade');
            $table->foreign('DoctorID')->references('DoctorID')->on('doctors')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_medications');
    }
};
