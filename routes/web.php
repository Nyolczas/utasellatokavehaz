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
Route::get('/adsoftdrink', 'SoftdrinkController@index')->middleware('auth')->name('adsoftdrink');
Route::resource('/softdrink', 'SoftdrinkController')->middleware('auth');
Route::get('/adfruit', 'FruitController@index')->middleware('auth')->name('adfruit');
Route::resource('/fruit', 'FruitController')->middleware('auth');
Route::get('/admineralsyrup', 'MineralController@index')->middleware('auth')->name('admineralsyrup');
Route::resource('/mineral', 'MineralController')->middleware('auth');
Route::resource('/syrup', 'SyrupController')->middleware('auth');
Route::get('/adalcohol', 'BeerController@index')->middleware('auth')->name('adalcohol');
Route::resource('/beer', 'BeerController')->middleware('auth');
Route::resource('/wine', 'WineController')->middleware('auth');
Route::resource('/spirit', 'SpiritController')->middleware('auth');
