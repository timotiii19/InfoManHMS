<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
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

    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
