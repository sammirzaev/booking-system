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
Route::get('/', 'IndexController@index')->name('index');
Route::resource('/hotel', 'HotelController')->names('hotel');

/**
 * User routes
 */
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('index');
});

/**
 * Admin part routes
 */
Route::middleware(['auth', 'auth.admin'])->prefix('backend')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');

    Route::resource('/location', 'LocationController')->names('location');
    Route::resource('/media', 'MediaController')->names('media');

    Route::resource('/hotel', 'HotelController')->names('hotel');
    Route::resource('/hotel-type', 'HotelTypeController')->names('hotel.type');
    Route::resource('/hotel-bonus', 'HotelBonusController')->names('hotel.bonus');
    Route::resource('/hotel-facility', 'HotelFacilityController')->names('hotel.facility');
    Route::resource('/hotel-surround', 'HotelSurroundController')->names('hotel.surround');
});
