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

// 관리자 페이지, Todo
Route::group(['prefix' => 'manage'], function() {
	// Dashboard
	Route::get('/', ['as' => 'manage', 'uses' => 'Manage\ManageController@index']);
	Route::get('dashboard', ['as' => 'manage.dashboard', 'uses' => 'Manage\ManageController@dashboard']);
	// Config
	Route::get('config', ['as' => 'manage.config', 'uses' => 'Manage\ConfigController@index']);
	Route::put('configs/update', ['as' => 'manage.config.update', 'uses' => 'Manage\ConfigController@update']);
	// Todo
	Route::post('todo/changeStatus', ['as' => 'todo.changeStatus', 'uses' => 'Manage\TodoController@changeStatus']);
	Route::resource('todo', 'Manage\TodoController');
});

// Route::any('{all}', 'SitesController@index')->where('all', '.*');