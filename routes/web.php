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
Route::group(['namespace' => 'Manage'], function() {
	Route::get('manage', ['as' => 'manage', 'uses' => 'ManageController@index']);
	Route::get('manage/dashboard', ['as' => 'manage.dashboard', 'uses' => 'ManageController@dashboard']);
	Route::post('manage/todo/changeStatus', 'TodoController@changeStatus');
	Route::resource('manage/todo', 'TodoController');
});

// 설치 페이지
Route::get('install/index', ['as' => 'install.index', 'uses' => 'InstallController@index']);
// 라이센스 확인
Route::get('install/license', ['as' => 'install.license', 'uses' => 'InstallController@license']);
// 라이센스 체크 검사
Route::post('install/license', ['as' => 'install.license.check', 'uses' => 'InstallController@licenseCheck']);
// 설치 정보 입력
Route::get('install/form', ['as' => 'install.form', 'uses' => 'InstallController@form']);
// 설치 진행
Route::post('install/setup', ['as' => 'install.setup', 'uses' => 'InstallController@setup']);


Route::any('{all}', 'SitesController@index')->where('all', '.*');