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
        Schema::create('nurses', function (Blueprint $table) {
            $table->id('NurseID');
            $table->string('Name', 100);
            $table->unsignedBigInteger('DepartmentID');
            $table->string('Email', 100)->unique();
            $table->string('Availability', 20)->nullable();
            $table->string('ContactNumber', 15)->nullable();
            $table->timestamps();
        
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurses');
    }
};
