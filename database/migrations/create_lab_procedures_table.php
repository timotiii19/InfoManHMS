<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lab_procedures', function (Blueprint $table) {
            $table->id('LabProcedureID');
            $table->unsignedBigInteger('PatientID');
            $table->unsignedBigInteger('DoctorID');
            $table->dateTime('TestDate');
            $table->text('Result');
            $table->date('DateReleased');
            $table->timestamps();

            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
            $table->foreign('DoctorID')->references('DoctorID')->on('doctors')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_procedures');
    }
};
