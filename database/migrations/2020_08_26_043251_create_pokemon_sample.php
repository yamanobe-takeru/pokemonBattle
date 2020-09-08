<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonSample extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_sample', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('hp');
            $table->string('skill1');
            $table->string('skill2');
            $table->string('skill3');
            $table->string('skill4');
            $table->integer('power');
            $table->integer('pokemon_type1_id')->unsigned();
            $table->integer('pokemon_type2_id')->unsigned();
            $table->integer('skill_type_id')->unsigned();
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
        Schema::dropIfExists('pokemon_sample');
    }
}
