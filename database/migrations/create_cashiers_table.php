<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->id('CashierID');
            $table->string('Name', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cashiers');
    }
};
