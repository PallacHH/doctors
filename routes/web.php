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
Route::get('/{city}/doctors', 'DoctorsController@index');
Route::get('/{city}/doctors/{doctor}', 'DoctorsController@show');
Route::get('/{city}/doctor/create', 'DoctorsController@create')->middleware('auth')->name('doctors.create');
Route::post('/{city}/doctors', 'DoctorsController@store')->name('doctors.store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
