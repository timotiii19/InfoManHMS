<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('EmployeeID');
            $table->string('Name', 100);
            $table->string('Email', 100)->unique();
            $table->string('ContactNumber', 15);
            $table->enum('EmployeeType', ['Doctor', 'Nurse', 'Pharmacist', 'Cashier', 'Other']);
            $table->unsignedBigInteger('DepartmentID')->nullable();
            $table->timestamps();

            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
