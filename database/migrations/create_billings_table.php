<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientBillingTable extends Migration
{
    public function up(): void
    {
        Schema::create('patient_billing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->decimal('amount', 10, 2);
            $table->string('description')->nullable();
            $table->date('billing_date');
            $table->timestamps();

            // optional: foreign key
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_billing');
    }
}
