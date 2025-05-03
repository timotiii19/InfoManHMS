<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id('VisitorID');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('PhoneNumber');
            $table->date('VisitDate');
            $table->time('VisitTime');
            $table->unsignedBigInteger('PatientID');
            $table->timestamps();

            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
