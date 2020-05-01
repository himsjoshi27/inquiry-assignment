<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inquiries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', '20');
            $table->string('company_name', '50')->unique();
            $table->string('email')->unique();
            $table->string('phone', 10)->unique();
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->date('date');
            $table->timestamps();

            // add foreign keys
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('inquires');
    }
}
