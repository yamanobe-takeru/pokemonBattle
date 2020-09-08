<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMemorizeToPokemonSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokemon_skills', function (Blueprint $table) {
            $table->boolean('memorize_skill');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pokemon_skills', function (Blueprint $table) {
            $table->dropColumn('memorize_skill');
        });
    }
}
