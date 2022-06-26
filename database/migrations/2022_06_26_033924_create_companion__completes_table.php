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
        Schema::create('companion__completes', function (Blueprint $table) {
            $table->id();
            $table->string('NIC')->nullable();
            $table->string('Name')->nullable();
            $table->string('Address')->nullable();
            $table->string('Contact_No')->nullable();
            $table->string('Email')->nullable();
            $table->string('Role')->nullable();
            $table->string('Email_Verified_at')->nullable();
            $table->string('Password')->nullable();
            $table->string('Vehicle_type')->nullable();
            $table->string('Vehicle_brand')->nullable();
            $table->string('Vehicle_color')->nullable();
            $table->string('Vehicle_number')->nullable();
            $table->string('Numberofpassenger')->nullable();
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
        Schema::dropIfExists('companion__completes');
    }
};
