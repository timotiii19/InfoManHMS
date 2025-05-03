<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patient_medications', function (Blueprint $table) {
            $table->id('MedicationID');
            $table->unsignedBigInteger('PatientID');
            $table->unsignedBigInteger('PharmacyID');
            $table->string('Dosage', 100);
            $table->string('Frequency', 100);
            $table->string('Duration', 100);
            $table->timestamps();

            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
            $table->foreign('PharmacyID')->references('PharmacyID')->on('pharmacies')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_medications');
    }
};
