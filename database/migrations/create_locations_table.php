<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id('LocationID');
            $table->string('LocationName', 100); // e.g., Main Building, ER Wing
            $table->string('RoomName', 50);      // e.g., Room 101, ICU-2
            $table->string('RoomType', 50)->nullable(); // e.g., ICU, Ward
            $table->integer('Capacity')->nullable();
            $table->string('Description', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
