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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id('EmergencyID');
            $table->unsignedBigInteger('PatientID');
            $table->unsignedBigInteger('NurseID');
            $table->unsignedBigInteger('DoctorID');
            $table->dateTime('DateTime');
            $table->string('EmergencyType', 100);
            $table->timestamps();
        
            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
            $table->foreign('NurseID')->references('NurseID')->on('nurses')->onDelete('cascade');
            $table->foreign('DoctorID')->references('DoctorID')->on('doctors')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};
