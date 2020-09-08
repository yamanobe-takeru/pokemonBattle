<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('hp');
            $table->integer('skill1_id')->unsigned();
            $table->integer('skill2_id')->unsigned();
            $table->integer('skill3_id')->unsigned();
            $table->integer('skill4_id')->unsigned()->nullable();
            $table->integer('pokemon_type1_id')->unsigned();
            $table->integer('pokemon_type2_id')->unsigned();
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
        Schema::dropIfExists('pokemon');
    }
}
