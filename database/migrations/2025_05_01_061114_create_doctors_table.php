<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('DoctorID');
            $table->string('DoctorName', 100);
            $table->string('Email', 100)->unique();
            $table->string('Availability', 20)->nullable();
            $table->string('ContactNumber', 15)->nullable();
            $table->enum('DoctorType', ['Regular', 'Visiting']);
            $table->unsignedBigInteger('DepartmentID');
            $table->unsignedBigInteger('LocationID');
            $table->enum('RoomType', ['Ward', 'Private', 'Semi-Private'])->nullable();
            $table->timestamps();
        
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('cascade');
            $table->foreign('LocationID')->references('LocationID')->on('locations')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
