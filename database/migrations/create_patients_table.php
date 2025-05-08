<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id('PatientID');
            $table->string('Name', 100);
            $table->date('DateOfBirth');
            $table->enum('Sex', ['Male', 'Female']);
            $table->string('Address', 255);
            $table->string('ContactNumber', 15);
            $table->enum('PatientType', ['Outpatient', 'Inpatient']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
}
