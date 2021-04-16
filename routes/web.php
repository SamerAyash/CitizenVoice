<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', 'FrontController@home');
Route::get('/profile', ['as'=>'profile','uses'=>'UserController@index']);
Route::get('/profile/edit', ['as'=>'edit_user','uses'=>'UserController@edit_user']);
Route::put('/profile/update', ['as'=>'update_user','uses'=>'UserController@update_user']);
Route::get('/order/create', ['as'=>'create_order','uses'=>'UserController@create_order']);
Route::get('/order/{id}', ['as'=>'show_order','uses'=>'UserController@show_order']);
Route::delete('/order/{id}', ['as'=>'delete_order','uses'=>'UserController@delete_order']);
Route::post('/order/save', ['as'=>'store_order','uses'=>'UserController@store_order']);

Route::get('/{lang}', 'FrontController@setLocal')->name('setLocal');
Route::get('/last/article/{city?}', ['as'=>'news','uses'=>'FrontController@news']);
Route::get('/article/{id}/{slug}', ['as'=>'single_news','uses'=>'FrontController@single_news']);
Route::get('/interesting/sites', ['as'=>'interesting_sites','uses'=>'FrontController@interesting_sites']);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){

    ///////////////////////////////////////////////////////////
    Route::get('/login',['as'=>'admin.login','uses'=>'AdminAuth@login']);
    Route::post('/login',['as'=>'admin.dologin','uses'=>'AdminAuth@dologin']);
    Route::get('/forgot/password',['as'=>'admin.forgotPassword','uses'=>'AdminAuth@forgetPassword']);
    Route::post('/forgot/password',['as'=>'admin.resetPassword','uses'=>'AdminAuth@resetPassword']);
    Route::get('/reset/password/{token}',['as'=>'admin.resetPasswordToken','uses'=>'AdminAuth@resetPasswordWithToken']);
    Route::post('/update/{token}',['as'=>'admin.updatePassword','uses'=>'AdminAuth@updatePassword']);
    ///////////////////////////////////////////////////////////
    Route::group(['middleware'=>'admin:admin'],function (){
        /// First admin word means middleware class and second admin word means guard type
        Route::view('/dashboard', 'admin.dashboard')->name('admin.home');
        Route::resource('/users','UserController');
        Route::resource('/articles','ArticleController');
        Route::put('/users/block/{id}',['as'=>'users.block','uses'=>'UserController@block']);
        Route::put('/users/unblock/{id}',['as'=>'users.unblock','uses'=>'UserController@unblock']);
        Route::get('blocked/users',['as'=>'blockedUsers','uses'=>'UserController@blockedUsers']);

    });


});
