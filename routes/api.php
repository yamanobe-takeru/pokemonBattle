<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::prefix('v1')->namespace('Api\V1')->group(function () {
//    Route::get('pokemons', 'PokemonController@index')->name('pokemon.explain');
//});

Route::get('v1/pokemons', 'Api\V1\PokemonController@index')->name('pokemon.index');
Route::patch('v1/pokemons/{id}', 'Api\V1\PokemonController@update')->name('pokemon.update');
Route::get('v1/pokemons/skill', 'Api\V1\SkillController@skillIndex')->name('skill.index');
