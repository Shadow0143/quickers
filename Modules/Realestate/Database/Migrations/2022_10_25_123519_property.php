<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Property extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('appartment_for');
            $table->string('title');
            $table->integer('price');
            $table->string('type')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('utilities')->nullable();
            $table->string('wifi')->nullable();
            $table->string('parking')->nullable();
            $table->string('duration')->nullable();
            $table->string('pet_friendly')->nullable();
            $table->date('move_in_date')->nullable();
            $table->string('size')->nullable();
            $table->string('furnished')->nullable();
            $table->string('appliances')->nullable();
            $table->string('air_conditioning')->nullable();
            $table->string('outdoor_space')->nullable();
            $table->string('smoking_permit')->nullable();
            $table->string('amenities')->nullable();
            $table->longText('description');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->longText('address')->nullable();
            $table->integer('pin')->nullable();
            $table->string('available');
            $table->string('status');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}