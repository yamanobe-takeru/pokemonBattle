<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSkill1ToSkill3AndAddPokemonSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokemon_samples', function (Blueprint $table) {
            $table->dropColumn('skill1');
            $table->dropColumn('skill2');
            $table->dropColumn('skill3');
            $table->dropColumn('skill4');
            $table->integer('pokemon_skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pokemon_samples', function (Blueprint $table) {
            $table->dropColumn('pokemon_skills');
            $table->integer('skill1');
            $table->integer('skill1');
            $table->integer('skill1');
            $table->integer('skill1')->nullable();


        });
    }
}
