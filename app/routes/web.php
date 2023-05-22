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

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Auth::routes();

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Route::get('/', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');
Route::resource('admins','AdminController');

// Route::get('/home', 'PostsController@index')->name('posts.index');


//ログイン中のユーザーのみアクセス可能
Route::group(['middleware' => ['auth']], function () {
    //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
Route::post('/ajax/like', 'PostController@ajaxlike')->name('posts.ajaxlike');
});

Route::group(['middleware'=>['auth','can:admin-only']], function() {
    Route::get('account','AdminController@index')->name('admin.index');
});

Route::get('/admincreate','AdminController@create');
Route::post('/admincreate','AdminController@store')->name('admin.store');

Route::get('/my_page_list','UserController@update')->name('my_page_list');
Route::post('/userupdate','UserController@update')->name('user.update');

Route::post('/badcount','UserController@badCount')->name('users.badCount');

Route::post('/user_stop','UserController@stop')->name('users.stop');
Route::get('/user_stop','AdminController@index')->name('admin.index');

Route::get('/keyword','PostController@keyword')->name('posts.keyword');



