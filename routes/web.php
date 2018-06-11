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

// Route::group(['domain' => 'localhost', 'domain' => '192.168.0.55'], function() {
	Route::get('/', function () { return view('welcome'); });
// });

// 관리자 페이지, Todo
Route::group(['prefix' => 'manage'], function() {
	// Dashboard
	Route::get('/', ['as' => 'manage', 'uses' => 'Manage\ManageController@index']);
	Route::get('dashboard', ['as' => 'manage.dashboard', 'uses' => 'Manage\ManageController@dashboard']);
	// Config
	Route::get('config', ['as' => 'manage.config', 'uses' => 'Manage\ConfigController@index']);
	Route::get('config/{id?}', ['as' => 'manage.config.show', 'uses' => 'Manage\ConfigController@show']);
	Route::put('config/update', ['as' => 'manage.config.update', 'uses' => 'Manage\ConfigController@update']);
	// Todo
	Route::post('todo/changeStatus', ['as' => 'todo.changeStatus', 'uses' => 'Manage\TodoController@changeStatus']);
	Route::post('todo/checkNotification', ['as' => 'todo.checkNotification', 'uses' => 'Manage\TodoController@checkNotification']);
	Route::resource('todo', 'Manage\TodoController');
});

// Route::any('{all}', 'SitesController@index')->where('all', '.*');