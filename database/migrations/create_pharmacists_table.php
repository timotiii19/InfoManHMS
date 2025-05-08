<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pharmacists', function (Blueprint $table) {
            $table->id('PharmacistID');
            $table->string('Name', 100);
            $table->string('ContactNumber', 15);
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pharmacists');
    }
};
