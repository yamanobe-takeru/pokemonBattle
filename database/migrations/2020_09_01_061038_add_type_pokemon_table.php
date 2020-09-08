<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokemon_samples', function (Blueprint $table) {
            $table->integer('pokemon_type_id');
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
            $table->dropColumn('pokemon_type_id');

        });
    }
}
