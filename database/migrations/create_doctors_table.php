<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('DoctorID'); // Primary Key
            $table->string('DoctorName', 100);
            $table->string('Email', 100)->unique();
            $table->string('Availability', 20);
            $table->string('ContactNumber', 15);
            $table->enum('DoctorType', ['Regular', 'Visiting']);
            $table->unsignedBigInteger('DepartmentID');
            $table->unsignedBigInteger('LocationID');
            $table->enum('RoomType', ['Ward', 'Private', 'Semi-Private']);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('cascade');
            $table->foreign('LocationID')->references('LocationID')->on('locations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
