<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropType1Type2FromPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokemon_samples', function (Blueprint $table) {
            $table->dropColumn('pokemon_type1_id');
            $table->dropColumn('pokemon_type2_id');
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
            $table->integer('pokemon_type1_id');
            $table->integer('pokemon_type2_id')->nullable();
        });
    }
}
