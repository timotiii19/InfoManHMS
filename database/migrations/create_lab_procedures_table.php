<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lab_procedures', function (Blueprint $table) {
            $table->id('ProcedureID');
            $table->unsignedBigInteger('PatientID');
            $table->string('ProcedureType', 100);
            $table->date('ProcedureDate');
            $table->text('Results')->nullable();
            $table->timestamps();

            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_procedures');
    }
};
