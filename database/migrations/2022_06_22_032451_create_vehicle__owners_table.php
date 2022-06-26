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
        Schema::create('vehicle__owners', function (Blueprint $table) {
            $table->id();
            $table->string('Owner_Name');
            $table->string('Owner_Address');
            $table->string('Company_Number');
            $table->string('Company_Email');
            $table->string('Driver_ID')->nullable();
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
        Schema::dropIfExists('vehicle__owners');
    }
};
