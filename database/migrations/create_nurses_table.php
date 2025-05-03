<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id('NurseID');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Gender');
            $table->date('DateOfBirth');
            $table->string('Phone');
            $table->string('Email')->unique();
            $table->string('Address');
            $table->string('Department');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nurses');
    }
};
