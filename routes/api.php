<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('get_room_by_hotel', 'HotelpageController@get_room_by_hotel')->name('get_room_by_hotel');
// Route::get('/hotel-list','HotelpageController@hotel_list_ajax')->name('hotel-administration-ajax');