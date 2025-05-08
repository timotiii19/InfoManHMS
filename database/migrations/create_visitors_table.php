<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id('VisitorID');
            $table->unsignedBigInteger('PatientID');
            $table->string('VisitorName', 100);
            $table->string('Relationship', 50);
            $table->dateTime('VisitDateTime');
            $table->unsignedBigInteger('LocationID');
            $table->string('ContactNumber', 15);

            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
            $table->foreign('LocationID')->references('LocationID')->on('locations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
