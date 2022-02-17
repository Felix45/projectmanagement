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
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile');
Route::get('/profile/{user}/edit','ProfilesController@edit')->name('profiles.edit');
Route::patch('/profile/{user}/','ProfilesController@update')->name('profiles.update');


Route::get('/project/create','ProjectsController@create')->name('create_project');
Route::get('/project/{project}','ProjectsController@show')->name('show_project');
Route::get('/project/{project}/edit','ProjectsController@update')->name('projects.update');
Route::post('/project/','ProjectsController@store');

Route::post('/task/create','TasksController@create')->name('tasks.create');
