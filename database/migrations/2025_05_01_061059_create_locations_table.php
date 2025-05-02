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
        Schema::create('locations', function (Blueprint $table) {
            $table->id('LocationID');
            $table->enum('RoomType', ['Ward', 'Private', 'Semi-Private']);
            $table->integer('RoomCapacity');
            $table->enum('Availability', ['Occupied', 'Unoccupied']);
            $table->string('Building', 100);
            $table->integer('Floor');
            $table->integer('RoomNumber');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
