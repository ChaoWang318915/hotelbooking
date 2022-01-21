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

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('/templates/home');
});


Route::get('/registration',function()
{
   return view('registration'); 
});

Route::get('/hotel-page',function()
{
  return view('/frontend/hotel-page');
});
Route::get('/info-page',function()
{
  return view('/frontend/info-page');
});


Route::get('/info-page/facts',function()
{
  return view('/frontend/info-page/facts');
});

Route::get('/info-page/flora-and-fauna',function()
{
  return view('/frontend/info-page/flora-and-fauna');
});

Route::get('/info-page/news',function()
{
  return view('/frontend/info-page/news');
});


Route::get('get_room_by_hotel', 'HotelpageController@get_room_by_hotel')->name('get_room_by_hotel');
Route::get('/teaser-page','TeaserpageController@teaserpage');
Route::post('/teaser-page','TeaserpageController@teaserpagepost');
Route::get('teaser-filter','TeaserpageController@teaser_filter');
Route::get('teaser-filter-bookmark','TeaserpageController@teaser_filter_bookmark');
Route::get('allHotels','TeaserpageController@allHotels');

Route::get('/hotel-page/{url_key}','HotelpageController@hotelpage')->name('hotel-page');


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

// blade routeing for hotels
/*Route::get('/hotel-administration', function () {
    return view('/backend/hotels/hotel-administration');
});*/


/*Route::get('/add-room', function () {
    return view('/backend/hotels/add-room');
});*/
Route::get('/run-update-currency','CurrencyController@run_update_currency')->name('run-update-currency');
Route::get('/price-overview/{id}','RatesController@price_overview')->name('price-overview');
Route::post('add-session/{id}','RatesController@add_session')->name('add-session');
Route::post('add-session-transfer/{id}','RatesController@add_session_transfer')->name('add-session-transfer');
Route::post('add-session-meal/{id}','RatesController@add_session_meal')->name('add-session-meal');
Route::post('add-session-sp/{id}','RatesController@add_session_sp')->name('add-session-sp');
Route::post('add-session-menuplan/{id}','RatesController@add_session_menuplan')->name('add-session-menuplan');

Route::get('/add-prices/{id}/{did}','RatesController@add_price')->name('add-prices');
Route::get('/edit-transfer/{id}/{transferid}','RatesController@price_transfer')->name('edit-transfer');
Route::get('/edit-sp/{id}/{transferid}','RatesController@price_sp')->name('edit-sp');
Route::post('/update-price/{hotelId}/{sessionId}','RatesController@store_price')->name('update-price.store_price');
Route::post('/update-session/{sessionId}','RatesController@session_update')->name('update-session');
Route::post('/update-session/{sessionId}','RatesController@session_update')->name('update-session');
Route::post('/update-session-transfer/{sessionId}','RatesController@session_update_transfer')->name('update-session-transfer');
Route::post('/update-session-mealplan/{sessionId}','RatesController@session_update_mealplan')->name('update-session-mealplan');
Route::post('/update-session-sp/{sessionId}','RatesController@session_update_sp')->name('update-session-sp');
Route::post('/meal_plan_update/{hotelId}/{sessionId}','RatesController@meal_plan_update')->name('meal_plan_update');

Route::get('/price-menuplan/{id}/{did}','RatesController@price_menuplan')->name('price-menuplan');
Route::get('/price-mealplan/{id}/{did}','RatesController@price_mealplan')->name('price-mealplan');
Route::get('/price-delete/{sessionid}','RatesController@price_delete')->name('price-delete');
Route::get('/price-meal-delete/{sessionid}','RatesController@price_meal_delete')->name('price-meal-delete');
Route::get('/price-transfer-delete/{sessionid}','RatesController@price_transfer_delete')->name('price-transfer-delete');
Route::get('/price-sp-delete/{sessionid}','RatesController@price_sp_delete')->name('price-sp-delete');
Route::post('/price-menuplan-update/{id}/{did}','RatesController@price_menuplan_update')->name('price-menuplan-update');
Route::post('/transfer_updatedata/{hotelId}/{sessionid}','RatesController@transfer_updatedata')->name('transfer_updatedata');
Route::post('/sp_updatedata/{hotelId}/{sessionid}','RatesController@sp_updatedata')->name('sp_updatedata');
Route::get('/price-transfer/{id}', function () {
    return view('/backend/hotels/price-transfer');
});
Route::get('/price-additional-service/{id}', function () {
    return view('/backend/hotels/price-additional-service');
});
Route::get('/discounts/{id}','DiscountsController@discount')->name('discounts');

Route::post('/discount-create/{id}','DiscountsController@discount_create')->name('discount-create');
Route::get('/discount-delete/{id}/{did}','DiscountsController@discount_delete')->name('discount-delete');
Route::get('/discount-edit/{id}/{did}','DiscountsController@discount_edit')->name('discount-edit');
Route::post('/discount-update/{id}/{did}','DiscountsController@discount_update')->name('discount-update');
Route::get('/restaurants-bars-overview/{id}','RestaurantsController@restaurant_list')->name('restaurants-bars-overview');
Route::post('/restaurant-create/{id}','RestaurantsController@restaurant_create')->name('restaurant-create');
Route::get('/add-restaurants/{id}', function () {
    return view('/backend/hotels/add-restaurants');
});
Route::get('restaurant-delete/{id}/{tid}','RestaurantsController@restaurant_delete')->name('restaurant-delete');
Route::post('restaurant-status','RestaurantsController@restaurant_status')->name('restaurant-status');
Route::post('bar-status','RestaurantsController@bar_status')->name('bar-status');
Route::post('menuplan-status','RestaurantsController@menuplan_status')->name('menuplan-status');
Route::get('/add-bars/{id}', function () {
    return view('/backend/hotels/add-bars');
});
Route::post('/bar-create/{id}','RestaurantsController@bar_create')->name('bar-create');
Route::get('/bar-overview/{id}','RestaurantsController@bar_list')->name('bar-overview');
Route::get('bar-delete/{id}/{tid}','RestaurantsController@bar_delete')->name('bar-delete');
Route::post('bar-status','RestaurantsController@bar_status')->name('bar-status');
Route::get('/menuplan-overview/{id}','RestaurantsController@menuplan_list')->name('menuplan-overview');
Route::get('/add-menuplan/{id}', function () {
    return view('/backend/hotels/add-menuplan');
});


// Hotel Includes 
Route::get('/include-add/{id}', function () {
    return view('/backend/hotels/include-add');
});

Route::post('/include-create/{id}','HotelincludeController@include_create')->name('include-create');
Route::get('/include-overview/{id}','HotelincludeController@include_list')->name('include-overview');
Route::get('include-delete/{id}/{tid}','HotelincludeController@include_delete')->name('include-delete');
Route::post('include-status','HotelincludeController@include_status')->name('include-status');
Route::post('/include-update/{rid}','HotelincludeController@include_update')->name('include-update');
Route::get('/include-edit/{id}/{rid}','HotelincludeController@include_edit')->name('include-edit');
Route::get('include-sort', 'HotelincludeController@sort')->name('include-sort');


// hotel includes



Route::post('/menuplan-create/{id}','RestaurantsController@menuplan_create')->name('menuplan-create');
Route::get('menuplan-delete/{id}/{tid}','RestaurantsController@menuplan_delete')->name('menuplan-delete');

Route::get('/transfers/{id}','TransferController@edit_transfer')->name('transfers');
Route::post('/transfers-update/{id}','TransferController@transfer_update')->name('transfers-update');
Route::get('/tag-manager/{id}','TagController@tag_manager')->name('tag-manager');
Route::get('/add-tag/{id}', function () {
    return view('/backend/hotels/add-tag');
});
Route::post('/tag-save/{id}','TagController@tag_add')->name('tag-save');
Route::get('/tag-delete/{id}/{tid}','TagController@tag_delete')->name('tag-delete');
Route::get('/tag-edit/{id}/{tid}','TagController@tag_edit')->name('tag-edit');
Route::post('/tag-update/{id}/{tid}','TagController@tag_update')->name('tag-update');
Route::post('/tag-status','TagController@tag_status')->name('tag-status');
Route::get('/texts/{id}','TextController@teaser_text')->name('texts');
Route::post('/text_update/{id}','TextController@text_update')->name('text-update');
Route::get('/hotel-texts/{id}','TextController@hotel_text')->name('hotel-texts');
Route::post('/hotel-texts-update/{id}','TextController@hotel_text_update')->name('hotel-texts-update');
Route::get('/hotel-features/{id}','TextController@hotel_features')->name('hotel-features');
Route::post('/hotel-features-update/{id}','TextController@hotel_features_update')->name('hotel-features-update');
Route::get('/info-pages/{id}','TextController@info_pages' )->name('info-pages');
Route::post('/info-pages-update/{id}','TextController@info_pages_update')->name('info-pages-update');
Route::get('/content/{id}','TextController@text_content')->name('content');
Route::post('/content-update/{id}','TextController@content_update')->name('content-update');
Route::get('/booking-texts/{id}','BookingTextController@regular_price_view')->name('booking-texts');
Route::post('/regular-price-update/{id}','BookingTextController@regular_price_update')->name('regular-price-update');
Route::get('/on-request/{id}','BookingTextController@on_request')->name('on_request');
Route::post('/on-request-update/{id}','BookingTextController@on_request_update')->name('on-request-update');
Route::get('/special-price/{id}','BookingTextController@special_price')->name('special-price');
Route::post('/special-price-update/{id}','BookingTextController@special_price_update')->name('special-price-update');



// routing for Availability
// Route::get('/availability-overview','AvailabilityController@availability_overview')->name('availability-overview');

Route::resource('availability-overview','AvailabilityController');

// routing for currency
Route::get('/currency-overview', function () {
    return view('/backend/currency/currency-overview');
});
Route::get('/add-currency', function () {
    return view('/backend/currency/currency');
});

// routing for sitemanager
/*Route::get('/sitemanager', function () {
    return view('/backend/sitemanager/sitemanager');
});*/


/*Route::get('/tp-header-texts', function () {
    return view('/backend/teaserpage_header/tp-header-texts');
});
*/
/*Route::get('/add-room/{id}', function () {
    return view('/backend/hotels/add-room');
});*/
Route::get('/add-room/{id}','RoomController@room_add')->name('add-room');
Route::post('room-save','RoomController@room_save')->name('room-save');
Route::get('/rooms-overview/{id}','RoomController@room_list')->name('rooms-overview');
Route::get('/room-delete/{id}','RoomController@room_delete')->name('room-delete');
Route::get('/room-edit/{id}/{rid}','RoomController@room_edit')->name('room-edit');
Route::get('/restaurant-edit/{id}/{rid}','RestaurantsController@restaurant_edit')->name('restaurant-edit');
Route::get('/bar-edit/{id}/{rid}','RestaurantsController@bar_edit')->name('bar-edit');
Route::get('/menuplan-edit/{id}/{mid}','RestaurantsController@menuplan_edit')->name('menuplan-edit');
Route::post('/room-update/{id}','RoomController@room_update')->name('room-update');
Route::post('/restaurant-update/{rid}','RestaurantsController@restaurant_update')->name('restaurant-update');
Route::post('/bar-update/{rid}','RestaurantsController@bar_update')->name('bar-update');
Route::post('/menuplan-update/{mid}','RestaurantsController@menuplan_update')->name('menuplan-update');
Route::get('/room-image-delete/{id}','RoomController@room_image_delete')->name('room-image-delete');
Route::get('/island-image-delete/{id}','IslandController@island_image_delete')->name('island-image-delete');
Route::get('/restaurant-image-delete/{rid}','RestaurantsController@restaurant_image_delete')->name('restaurant-image-delete');
Route::get('/bar-image-delete/{rid}','RestaurantsController@bar_image_delete')->name('bar-image-delete');
Route::Post('/room-status','RoomController@room_status')->name('room-status');
/*Route::get('/hotel-details', function () {
    return view('/backend/hotels/hotel-details');
});*/
Route::get('/hotel-administration','HotelController@hotel_list')->name('hotel-administration');
Route::get('/hotel-list','HotelpageController@hotel_list_ajax')->name('hotel-administration-ajax');
Route::get('/get-hotel-rooms','HotelpageController@get_hotel_rooms')->name('get-hotel-rooms');
Route::get('/get-room-occupancy','HotelpageController@get_room_occupancy')->name('get-room-occupancy');
Route::get('/get-minstay','HotelpageController@get_minstay')->name('get-minstay');
Route::get('/hotel-details','HotelController@hotel_add')->name('hotel-details');
Route::Post('/hotel-status','HotelController@status_update')->name('hotel-status');
Route::post('/hotel-save','HotelController@hotel_save')->name('hotel-save');
Route::post('/hotel-search','HotelpageController@hotel_search')->name('hotel-search');
Route::post('/user_currency','HotelpageController@user_currency')->name('user_currency');
Route::get('/hotel-delete/{id}','HotelController@hotel_delete')->name('hotel-delete');
Route::get('/hotel-edit/{id}','HotelController@hotel_edit')->name('hotel-edit');
Route::post('/hotel-update/{id}','HotelController@hotel_update')->name('hotel-update');
Route::get('/hotel-image-delete/{id}','HotelController@hotel_image_delete')->name('hotel-image-delete');
Route::get('/hotel-detail-image-delete/{id}','HotelController@hotel_detail_image_delete')->name('hotel-detail-image-delete');

Route::get('/add-atoll', function () {
    return view('/backend/atolls/add-atoll');
});
Route::Post('/atoll-add','AtollController@atoll_add')->name('atoll-add');
Route::get('/atolls','AtollController@atoll_list')->name('atolls');
Route::post('/atoll-status','AtollController@atoll_status')->name('atoll-status');
Route::get('/atoll-delete/{id}','AtollController@atoll_delete')->name('atoll-delete');
Route::get('/atoll-edit/{atolid}','AtollController@atoll_edit')->name('atoll-edit');
Route::post('/atoll-update/{id}','AtollController@atoll_update')->name('atoll-update');
Route::get('/atoll-image-delete/{id}','AtollController@atoll_image_delete')->name('atoll-image-delete');

Route::get('/add-islands','IslandController@island_add')->name('add-islands');
Route::post('/island-save','IslandController@island_save')->name('island-save');
Route::post('/island-status','IslandController@island_status')->name('island-status');
Route::get('/islands','IslandController@island_list')->name('islands');
Route::get('/island-delete/{id}','IslandController@island_delete')->name('island-delete');
Route::get('/islands-edit/{iid}','IslandController@island_edit')->name('island-edit');
Route::post('/islands-update/{id}','IslandController@island_update')->name('islands-update');
Route::get('tp-header-texts','TeaserController@teaser_page')->name('tp-header-texts');
Route::post('teaser-page-update/{id}','TeaserController@teaser_update')->name('teaser-page-update');
Route::get('sitemanager','TeaserController@sitemanager_page')->name('sitemanager');
Route::post('sitemanager-update/{id}','TeaserController@sitemanager_update')->name('sitemanager-update');

// Route::get('/form', function () {
//     return view('/frontend/form');
// });

Route::get('/anfrage', function () {
    return view('/frontend/inquiry');
});

Route::get('/booking', function () {
    return view('/frontend/booking');
});
Route::get('/gallery_image/{url_key}','HotelpageController@gallery_image')->name('gallery_image');


//Pages 
Route::get('/pages/content-verteiler',function()
{
   return view('frontend/pages/content-verteiler'); 
});

Route::get('/pages/info-page',function()
{
   return view('frontend/pages/info-page'); 
});

Route::get('/pages/inner-content-imprint',function()
{
   return view('frontend/pages/inner-content-imprint'); 
});

Route::get('/pages/inner-content-kontakt',function()
{
   return view('frontend/pages/inner-content-kontakt'); 
});

Route::get('/pages/inquiry',function()
{
   return view('frontend/pages/inquiry'); 
});

Route::get('/pages/review-page',function()
{
   return view('frontend/pages/review-page'); 
});