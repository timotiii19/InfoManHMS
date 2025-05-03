<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id('EmergencyID');
            $table->unsignedBigInteger('PatientID');
            $table->string('Condition', 255);
            $table->dateTime('ArrivalTime');
            $table->text('ActionsTaken')->nullable();
            $table->timestamps();

            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};
