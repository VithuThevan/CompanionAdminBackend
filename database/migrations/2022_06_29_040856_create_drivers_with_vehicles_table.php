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
        Schema::create('drivers_with_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('Driver_Name');
            $table->string('Driver_Address');
            $table->string('Driver_Number');
            $table->string('Driver_Email');
            $table->string('NIC')->nullable();
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
        Schema::dropIfExists('drivers_with_vehicles');
    }
};
