<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donner', function (Blueprint $table) {
            $table->id('donner_id');
            $table->string('name');
            $table->string('reg_num');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->enum('group',['A+','A-','B+','B-','AB+','AB-','O+','O-']);
            $table->string('location')->nullable();
            $table->string('history')->nullable();
            $table->date('date')->nullable();
            $table->string('team')->nullable();
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
        Schema::dropIfExists('donner');
    }
}
