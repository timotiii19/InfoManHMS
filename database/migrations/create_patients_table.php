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
            $table->string('Address', 255)->nullable();
            $table->string('ContactNumber', 15)->nullable();
            $table->enum('PatientType', ['Outpatient', 'Inpatient']);
            $table->timestamps();
            $table->unsignedBigInteger('LocationID')->nullable();  // Patient location ID
            
            $table->foreign('LocationID')->references('LocationID')->on('locations')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign(['LocationID']);
            $table->dropColumn('LocationID');
        });
    }
}
