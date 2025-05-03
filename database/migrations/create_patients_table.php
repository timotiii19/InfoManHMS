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
            $table->string('FirstName');
            $table->string('LastName');
            $table->enum('Gender', ['Male', 'Female', 'Other']);
            $table->date('DOB');
            $table->string('Phone')->nullable();
            $table->string('Email')->nullable();
            $table->string('Address')->nullable();
            $table->unsignedBigInteger('LocationID')->nullable();
            $table->timestamps();

            $table->foreign('LocationID')->references('LocationID')->on('locations')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
}
