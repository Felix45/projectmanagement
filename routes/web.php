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

Route::get('/home', 'ProfilesController@index')->name('home');
Route::get('/profile/{id}', 'ProfilesController@index')->name('profile');

Route::get('/project/create','ProjectsController@create')->name('create_project');
Route::post('/project/','ProjectsController@store');
