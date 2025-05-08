<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id('MedicineID');
            $table->unsignedBigInteger('PharmacistID');
            $table->text('Description');
            $table->integer('StockQuantity');
            $table->decimal('Price', 20, 5)->check('Price > 0');
            $table->timestamps();

            $table->foreign('PharmacistID')->references('PharmacistID')->on('pharmacists')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pharmacies');
    }
};
