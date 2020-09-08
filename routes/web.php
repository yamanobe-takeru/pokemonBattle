<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pokemon', function () {
    return view('battle'); // TODO：Controller化
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
    $pokemon = \App\Models\PokemonSample::find(1);
    //var_dump($pokemon->skill()->updateExistingPivot(4,  ['memorize_skill' => 1]));
    dd($pokemon->skill()->wherePivot('skill_id', 1)->wherePivot('memorize_skill', 0));
});
