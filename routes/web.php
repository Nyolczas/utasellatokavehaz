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


Auth::routes();

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adkave', 'KaveController@index')->middleware('auth')->name('adkave');
Route::resource('/kave', 'KaveController')->middleware('auth');
Route::get('/adhotdrinks', 'HotdrinkController@index')->middleware('auth')->name('adhotdrinks');
Route::resource('/hotdrinks', 'HotdrinkController')->middleware('auth');
