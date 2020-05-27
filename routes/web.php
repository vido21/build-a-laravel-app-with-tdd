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

Route::group(['middleware' => 'auth'], function () {
    Route::get('projects', 'ProjectsController@index')->name('projects');
    Route::get('projects/create', 'ProjectsController@create')->name('projects.create');
    Route::get('projects/{project}', 'ProjectsController@show')->name('projects.show');
    Route::get('projects/{project}/edit', 'ProjectsController@edit')->name('projects.edit');
    Route::delete('projects/{project}', 'ProjectsController@destroy')->name('projects.delete');
    Route::patch('projects/{project}', 'ProjectsController@update')->middleware('can:update,project')->name('projects.update');
    Route::post('projects', 'ProjectsController@store')->name('projects.store');
    //Route::resource('projects', 'ProjectsController');

    Route::post('projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('projects/{project}/tasks/{task}', 'ProjectTasksController@update');
});
