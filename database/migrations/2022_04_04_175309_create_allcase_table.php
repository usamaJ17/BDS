<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllcaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allcase', function (Blueprint $table) {
            $table->id('number');
            $table->string('patient_name',30)->nullable();
            $table->enum('patient_blood',['A+','A-','B+','B-','AB+','AB-','O+','O-']);
            $table->text('location');
            $table->string('age',15)->nullable();
            $table->string('attendent_name',30)->nullable();
            $table->string('attendent_contact',11);
            $table->enum('attendent_blood',['A+','A-','B+','B-','AB+','AB-','O+','O-'])->nullable();
            $table->enum('arranged_by',['attendent','BDS'])->nullable();
            $table->unsignedBigInteger('donner_id')->nullable();
            $table->foreign('donner_id')->references('donner_id')->on('donner');
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
        Schema::dropIfExists('allcase');
    }
}
