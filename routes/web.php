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
Route::get('/order/create', ['as'=>'create_order','uses'=>'UserController@create_order']);
Route::post('/order/save', ['as'=>'store_order','uses'=>'UserController@store_order']);

Route::get('/{lang}', 'FrontController@setLocal')->name('setLocal');
Route::get('/last/news/{city?}', ['as'=>'news','uses'=>'FrontController@news']);
Route::get('/news/{id}/{slug}', ['as'=>'single_news','uses'=>'FrontController@single_news']);
Route::get('/interesting/sites', ['as'=>'interesting_sites','uses'=>'FrontController@interesting_sites']);
Route::get('/home', 'HomeController@index')->name('home');

