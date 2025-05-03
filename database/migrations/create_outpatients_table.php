<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('outpatients', function (Blueprint $table) {
            $table->id('OutpatientID');
            $table->unsignedBigInteger('PatientID');
            $table->date('VisitDate');
            $table->string('Diagnosis');
            $table->string('Treatment');
            $table->string('Doctor');
            $table->timestamps();

            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outpatients');
    }
};
