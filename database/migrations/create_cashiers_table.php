<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->id('CashierID');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Email')->unique();
            $table->string('PhoneNumber');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cashiers');
    }
};
