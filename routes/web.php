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

Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::match(['get', 'post'], 'login', ['uses' => 'AuthController@index', 'as' => 'admin.auth.index']);
        Route::match(['get', 'post'], 'register', ['uses' => "AuthController@register", 'as' => 'admin.auth.register']);
        Route::get('logout', ['uses' => 'AuthController@logout', 'as' => 'admin.auth.logout']);
        Route::get('index', ['uses' => 'IndexController@index', 'as' => 'admin.index.index']);

        //角色管理
        Route::resource('role', 'RoleController');

        //菜单管理
        Route::resource('menu', 'MenuController');

        //日志管理
        Route::get('log', 'LogController@index');
        Route::get('log/download/{fileName}', 'LogController@download');
        Route::get('log/read/{fileName}', 'LogController@read');
        Route::any('log/delete/{fileName}', 'LogController@delete');

        //网站配置
        Route::get('setting/index', 'SettingController@index');
        Route::post('setting/save', 'SettingController@save');

        //语言切换
        Route::post('lang/{lang}','LangController@change');

        //验证码
        Route::get('captcha/{tmp}','CodeController@captcha');
    });
});





