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

Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');
//Route:: get('/user','UserController@index')->name('user');

Route::resource('users', 'UserController', ['except' => ['show']]);
Route::resource('reservations', 'ReservationController', ['except' => ['show']]);

Route::resource('management', 'ManagementController', ['except' => ['show']]);
Route::resource('rooms', 'RoomController', ['except' => ['show']]);
