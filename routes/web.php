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

// Route::group(['domain' => 'localhost', 'domain' => '192.168.0.55'], function() {
// 기본 홈
Route::get('/', ['as' => 'home', 'uses' => 'MainController@index'] );

// 로그인 후 리다이렉트
Route::get('/home', function() {
    return redirect(route('home'));
});
// });

// 회원 가입
Route::get('user/terms', ['as' => 'user.terms', 'uses' => 'Auth\RegisterController@terms']);
Route::get('user/registerForm', ['as' => 'user.register.form.get', 'uses' => 'Auth\RegisterController@registerFormGet']);
Route::post('user/registerForm', ['as' => 'user.register.form', 'uses' => 'Auth\RegisterController@registerForm']);
Route::post('user/register', ['as' => 'user.register', 'uses' => 'Auth\RegisterController@register']);
Route::get('user/welcome', ['as' => 'user.welcome', 'uses' => 'UserController@welcome']);
// 로그인
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
// 비밀번호 재설정
Route::get('user/remind', ['as' => 'remind.create', 'uses' => 'Auth\PasswordsController@getRemind']);
Route::post('user/remind', ['as' => 'remind.store', 'uses' => 'Auth\PasswordsController@postRemind']);
Route::get('user/reset/{token}', ['as' => 'reset.create', 'uses' => 'Auth\PasswordsController@getReset'])->where('token', '[\pL-\pN]{64}');
Route::post('user/reset', ['as' => 'reset.store', 'uses' => 'Auth\PasswordsController@postReset']);

// 관리자 페이지
Route::group(['prefix' => 'manage'], function() {
	// Dashboard
	Route::get('/', ['as' => 'manage', 'uses' => 'Manage\ManageController@index'])->middleware('auth');
	Route::get('dashboard', ['as' => 'manage.dashboard', 'uses' => 'Manage\ManageController@dashboard'])->middleware('auth');
	// Config
	Route::get('config', ['as' => 'manage.config', 'uses' => 'Manage\ConfigController@index']);
	Route::get('config/{id?}', ['as' => 'manage.config.show', 'uses' => 'Manage\ConfigController@show']);
	Route::put('config/update', ['as' => 'manage.config.update', 'uses' => 'Manage\ConfigController@update']);
	// Todo
	Route::post('todo/changeStatus', ['as' => 'todo.changeStatus', 'uses' => 'Manage\TodoController@changeStatus']);
	Route::post('todo/checkNotification', ['as' => 'todo.checkNotification', 'uses' => 'Manage\TodoController@checkNotification']);
	Route::resource('todo', 'Manage\TodoController');
	// Menu
	Route::get('menu', ['as' => 'manage.menu.index', 'uses' => 'Manage\MenuController@index']);
    Route::get('menu/create', ['as' => 'mange.menu.create', 'uses' => 'Manage\MenuController@create']);
    Route::post('menu', ['as' => 'manage.menu.store', 'uses' => 'Manage\MenuController@store']);
    Route::post('menu/result', ['as' => 'manage.menu.result', 'uses' => 'Manage\MenuController@result']);
});

// Route::any('{all}', 'SitesController@index')->where('all', '.*');