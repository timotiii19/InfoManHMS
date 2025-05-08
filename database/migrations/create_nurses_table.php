<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id('NurseID');
            $table->string('Name', 100);
            $table->unsignedBigInteger('DepartmentID');
            $table->string('Email', 100)->unique();
            $table->string('Availability', 20);
            $table->string('ContactNumber', 15);
            $table->timestamps();

            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nurses');
    }
};
