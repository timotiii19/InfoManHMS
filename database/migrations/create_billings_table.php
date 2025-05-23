<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patient_billing', function (Blueprint $table) {
            $table->id('BillingID');
            $table->unsignedBigInteger('PatientID');
            $table->decimal('DoctorFee', 10, 2);
            $table->decimal('MedicineCost', 10, 2);
            $table->decimal('TotalAmount', 10, 2)->storedAs('DoctorFee + MedicineCost'); // GENERATED column
            $table->date('PaymentDate');
            $table->string('Receipt', 255)->unique();
            $table->timestamps();

            $table->foreign('PatientID')->references('PatientID')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_billing');
    }
};
