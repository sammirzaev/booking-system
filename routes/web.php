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


Route::get('change-language/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl();
    $parse_url = parse_url($referer, PHP_URL_PATH);
    $segments = explode('/', $parse_url);

    if (in_array($segments[1], App\Http\Middleware\Locale::$languages)) {
        unset($segments[1]);
    }
    if ($lang != App\Http\Middleware\Locale::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }
    $url = Request::root().implode("/", $segments);
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url);
})->name('setlocale');

Route::prefix(App\Http\Middleware\Locale::getLocale())->group(function () {
    Auth::routes();

    Route::get('/', 'IndexController@index')->name('index');
    Route::resource('/hotel', 'HotelController')->names('hotel');

    Route::resource('/hotel-check-out', 'HotelCheckoutController')->names('hotel.checkout');

    Route::resource('/room-search', 'RoomSearchController')->only('index')->names('room.search');

    Route::resource('/booking', 'BookingController')->only('index')->names('booking');

    /**
     * User routes
     */
    Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('index');
        Route::resource('/order', 'OrderController')->names('order');
    });

    /**
     * Admin part routes
     */
    Route::middleware(['auth', 'auth.admin'])->prefix('backend')->namespace('Admin')->name('admin.')->group(function () {
        Route::get('/', 'IndexController@index')->name('index');
        Route::resource('/order', 'OrderController')->names('order');

        Route::resource('/location', 'LocationController')->names('location');
        Route::resource('/media', 'MediaController')->names('media');

        Route::resource('/hotel', 'HotelController')->names('hotel');
        Route::resource('/hotel-type', 'HotelTypeController')->names('hotel.type');
        Route::resource('/hotel-bonus', 'HotelBonusController')->names('hotel.bonus');
        Route::resource('/hotel-facility', 'HotelFacilityController')->names('hotel.facility');
        Route::resource('/hotel-surround', 'HotelSurroundController')->names('hotel.surround');

        Route::resource('/room', 'RoomController')->names('room');
        Route::resource('/room-type', 'RoomTypeController')->names('room.type');
        Route::resource('/room-bonus', 'RoomBonusController')->names('room.bonus');
        Route::resource('/room-facility', 'RoomFacilityController')->names('room.facility');

        Route::resource('/user', 'UserController')->names('user');
    });

    Route::get('paginate/{name}/{value}', function ($name, $value) {
        Cookie::queue($name, $value);
        return response()->redirectTo(Redirect::back()->getTargetUrl());
    })->name('paginate');

});
