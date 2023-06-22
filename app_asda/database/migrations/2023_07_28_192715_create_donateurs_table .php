<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donateurs', function (Blueprint $table) {
            $table->id();
            $table->text('name');
           
            $table->bigInteger('Gender_id')->unsigned()->nullable();
            $table->foreign('Gender_id')->references('id')->on('genders')->onDelete('set null');
            $table->string('Phone_Donateur');
            $table->text('Address')->nullable();
            $table->timestamps();
            $table->string('Email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donateurs');
    }
}
