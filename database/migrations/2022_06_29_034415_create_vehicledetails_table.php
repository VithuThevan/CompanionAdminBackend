<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicledetails', function (Blueprint $table) {
            $table->id();
            $table->string('Vehicle_type');
            $table->string('Vehicle_brand');
            $table->string('Vehicle_color');
            $table->string('Vehicle_number');
            $table->string('Number_of_passenger');
            $table->string('Owner_ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicledetails');
    }
};
