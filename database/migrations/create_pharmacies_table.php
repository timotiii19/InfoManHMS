<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id('PharmacyID');
            $table->string('MedicineName', 100);
            $table->string('Manufacturer', 100)->nullable();
            $table->date('ExpirationDate');
            $table->integer('Quantity');
            $table->decimal('Price', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pharmacies');
    }
};
