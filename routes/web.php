<?php

use Illuminate\Http\Request;

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
Route::resource('hotels', 'HotelController', []);
Route::post('hotels/check', 'HotelController@check')->name('hotels.check');

Route::resource('management', 'ManagementController', ['except' => ['show']]);
Route::resource('rooms', 'RoomController');


Route::get('/api/hotel/{id}/rooms', function (Request $request) {
    $rooms = \App\Models\Room::where('hotel_id', 3)->get();
    return json_encode($rooms);
});
Route::get('management/index','ManagementController@create');
Route::post('/management/upload','ManagementController@upload')->name('management.upload');

Route::get('/management/book/{id}/','ManagementController@book')->name('management.book');
Route::get('/hotel/res/{id}/', 'HotelController@res')->name('hotel.res');
