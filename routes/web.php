<?php

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

Auth::routes();

Route::get('/superheroes', 'SuperHeroes\SuperHeroesController@index')->name('superheroes');
Route::get('/superheroes/list', 'SuperHeroes\SuperHeroesController@getListHeroes')->name('superheroes/list');
Route::get('/superheroes/edit', 'SuperHeroes\SuperHeroesController@getEditHero')->name('superheroes/edit');
Route::get('/superheroes/delete', 'SuperHeroes\SuperHeroesController@getDeleteHero')->name('superheroes/delete');
Route::post('/superheroes/deletephoto', 'SuperHeroes\SuperHeroesController@postDeleteHeroPhoto')->name('superheroes/deletephoto');
Route::get('/superheroes/see', 'SuperHeroes\SuperHeroesController@getSeeHero')->name('superheroes/see');
Route::post('/superheroes/save', 'SuperHeroes\SuperHeroesRegisterController@postSave')->name('superheroes/save');

