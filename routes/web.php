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

Route::group(['prefix' => 'admin'], function () {
    
    Route::get('/', 'AdminController@index')->name('get-admin-index');
    Route::get('/index', 'AdminController@index');

    // quản lý user
    Route::group(['prefix' => 'user'], function(){
        Route::get('/', 'UserController@view')->name('get-user-view');

        Route::get('add', 'UserController@create')->name('get-user-add');
        Route::post('add', 'UserController@store')->name('post-user-store');


        Route::get('edit/{id}', 'UserController@edit')->name('get-user-edit');
        Route::post('edit/{id}', 'UserController@update')->name('post-user-update');

        Route::get('delete/{id}', 'UserController@delete')->name('get-user-delete');
    });

    // quản lý liên hệ
    Route::group(['prefix' => 'contact'], function(){
        Route::get('/', 'ContactController@view')->name('get-contact-view');

        Route::get('delete/{id}', 'ContactController@delete')->name('get-contact-delete');
    });

    Route::group(['prefix' => 'room-type'], function(){
        Route::get('/', 'RoomTypeController@view')->name('get-room-type-index');

        Route::get('add', 'RoomTypeController@create')->name('get-room-type-create');
        Route::post('add', 'RoomTypeController@store')->name('post-room-type-store');

        Route::get('edit/{id}', 'RoomTypeController@edit')->name('get-room-type-edit');
        Route::post('edit/{id}', 'RoomTypeController@update')->name('post-room-type-update');

        Route::get('delete/{id}', 'RoomTypeController@delete')->name('get-room-type-delete');
    });
    Route::group(['prefix' => 'room-status'], function(){
        Route::get('/', 'RoomStatusController@view')->name('get-room-status-index');

        Route::get('add', 'RoomStatusController@create')->name('get-room-status-create');
        Route::post('add', 'RoomStatusController@store')->name('post-room-status-store');

        Route::get('edit/{id}', 'RoomStatusController@edit')->name('get-room-status-edit');
        Route::post('edit/{id}', 'RoomStatusController@update')->name('post-room-status-update');

        Route::get('delete/{id}', 'RoomStatusController@delete')->name('get-room-status-delete');
    });

    Route::group(['prefix' => 'payment-type'], function(){
        Route::get('/', 'PaymentTypeController@view');

        Route::get('add', 'PaymentTypeController@create')->name('get-payment-type-create');
        Route::post('add', 'PaymentTypeController@store')->name('post-payment-type-store');

        Route::get('edit/{id}', 'PaymentTypeController@edit')->name('get-payment-type-edit');
        Route::post('edit/{id}', 'PaymentTypeController@update')->name('post-payment-type-update');

        Route::get('delete/{id}', 'PaymentTypeController@delete')->name('get-payment-type-delete');

        Route::get('detail/{id}', 'PaymentTypeController@detail')->name('get-payment-type-detail');

        Route::post('edit/status/{id}', 'PaymentTypeController@editActive')->name('post-payment-type-edit-active');
    });

    Route::group(['prefix' => 'hotel'], function(){
        Route::get('/', 'HotelController@view')->name('get-hotel-index');

        Route::get('add', 'HotelController@create')->name('get-hotel-create');
        Route::post('add', 'HotelController@store')->name('post-hotel-store');

        Route::get('edit/{id}', 'HotelController@edit')->name('get-hotel-edit');
        Route::post('edit/{id}', 'HotelController@update')->name('post-hotel-update');

        Route::get('delete/{id}', 'HotelController@delete')->name('get-hotel-delete');

        Route::get('detail/{id}', 'HotelController@detail')->name('get-hotel-detail');
    });
    Route::group(['prefix' => 'utility'], function(){
        Route::get('/{id}', 'HotelController@detail')->name('get-utility');

        Route::get('add/{hotel_id}', 'UtilityController@create')->name('get-utility-create');
        Route::post('add/{hotel_id}', 'UtilityController@store')->name('post-utility-store');

        Route::get('edit/{id}', 'UtilityController@edit')->name('get-utility-edit');
        Route::post('edit/{id}', 'UtilityController@update')->name('post-utility-update');

        Route::get('delete/{id}', 'UtilityController@delete')->name('get-utility-delete');
    });

    Route::group(['prefix' => 'room'], function(){
        Route::get('/', 'RoomController@view')->name('get-room-index');

        Route::get('add', 'RoomController@create')->name('get-room-create');
        Route::post('add', 'RoomController@store')->name('post-room-store');

        Route::get('edit/{id}', 'RoomController@edit')->name('get-room-edit');
        Route::post('edit/{id}', 'RoomController@update')->name('post-room-update');

        Route::get('delete/{id}', 'RoomController@delete')->name('get-room-delete');

        Route::get('detail/{id}', 'RoomController@detail')->name('get-room-detail');
    });
    
    Route::group(['prefix' => 'room-image'], function () {
        Route::post('upload-multi-image/{room_id}', 'RoomImageController@uploadMultiImage');
        Route::get('delete/{id}', 'RoomImageController@delete')->name('get-room-image-delete');
    });
    Route::group(['prefix' => 'roombooking'], function(){
        Route::get('/', 'RoomBookingController@View');

         Route::get('add', 'RoomBookingController@getAdd');
         Route::post('add', 'RoomBookingController@store')->name('post-roombooking-store');


         Route::get('edit/{id}', 'RoomBookingController@edit')->name('get-roombooking-edit');
         Route::post('edit/{id}', 'RoomBookingController@update')->name('post-roombooking-update');

         Route::get('delete/{id}', 'RoomBookingController@delete')->name('get-roombooking-delete');
         
         Route::post('edit/status/{id}', 'RoomBookingController@editStatus')->name('post-roombooking-edit-status');
    });

    Route::group(['prefix'=>'ajax'],function(){
		Route::get('room/{idHotel}','AjaxController@getRoom');
	});
});