<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutpatientsTable extends Migration
{
    public function up(): void
    {
        Schema::create('outpatients', function (Blueprint $table) {
            $table->id('OutpatientID');
            $table->unsignedBigInteger('PatientID'); // Foreign key to patients table
            $table->unsignedBigInteger('DoctorID');
            $table->unsignedBigInteger('DepartmentID');
            $table->dateTime('VisitDate');
            $table->text('Reason');
            $table->timestamps();
        
            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
            $table->foreign('DoctorID')->references('DoctorID')->on('doctors')->onDelete('cascade');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outpatients');
    }
}
