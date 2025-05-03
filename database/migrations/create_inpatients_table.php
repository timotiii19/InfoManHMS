<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inpatients', function (Blueprint $table) {
            $table->id('InpatientID');
            $table->unsignedBigInteger('PatientID');
            $table->date('AdmissionDate');
            $table->date('DischargeDate')->nullable();
            $table->string('Diagnosis');
            $table->string('Treatment');
            $table->string('Doctor');
            $table->timestamps();

            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inpatients');
    }
};
