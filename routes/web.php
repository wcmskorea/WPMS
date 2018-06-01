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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['domain' => 'localhost'], function() {
	Route::get('/', function () { return view('welcome'); });
});

Route::group(['namespace' => 'Manage'], function() {
	Route::get('manage', ['as' => 'manage', 'uses' => 'ManageController@index']);
	Route::get('manage/dashboard', ['as' => 'manage.dashboard', 'uses' => 'ManageController@dashboard']);
	Route::get('manage/todo', ['as' => 'todo', 'uses' => 'TodoController@index']);
	Route::post('manage/todo', 'TodoController@store');
	Route::post('manage/todo/{id}', 'TodoController@done');
	// Route::resource('manage/todo', 'TodoController');
});

Route::any('{all}', 'SitesController@index')->where('all', '.*');