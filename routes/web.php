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
    
    Route::get('/', 'AdminController@index');
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

    Route::group(['prefix' => 'room-type'], function(){
        Route::get('/', 'RoomTypeController@view');

        Route::get('add', 'RoomTypeController@create')->name('get-room-type-create');
        Route::post('add', 'RoomTypeController@store')->name('post-room-type-store');

        Route::get('edit/{id}', 'RoomTypeController@edit')->name('get-room-type-edit');
        Route::post('edit/{id}', 'RoomTypeController@update')->name('post-room-type-update');

        Route::get('delete/{id}', 'RoomTypeController@delete')->name('get-room-type-delete');
    });
    Route::group(['prefix' => 'room-status'], function(){
        Route::get('/', 'RoomStatusController@view');

        Route::get('add', 'RoomStatusController@create')->name('get-room-status-create');
        Route::post('add', 'RoomStatusController@store')->name('post-room-status-store');

        Route::get('edit/{id}', 'RoomStatusController@edit')->name('get-room-status-edit');
        Route::post('edit/{id}', 'RoomStatusController@update')->name('post-room-status-update');

        Route::get('delete/{id}', 'RoomStatusController@delete')->name('get-room-status-delete');
    });

    Route::group(['prefix' => 'hotel'], function(){
        Route::get('/', 'HotelController@view');

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
        Route::get('/', 'HotelController@view');

        Route::get('add', 'RoomController@create')->name('get-room-create');
        Route::post('add', 'RoomController@store')->name('post-room-store');

        Route::get('edit/{id}', 'RoomController@edit')->name('get-room-edit');
        Route::post('edit/{id}', 'RoomController@update')->name('post-room-update');

        Route::get('delete/{id}', 'RoomController@delete')->name('get-room-delete');

        Route::get('detail/{id}', 'RoomController@detail')->name('get-room-detail');
    });

    Route::group(['prefix' => 'roombooking'], function(){
        Route::get('/', 'RoomBookingController@View');

         Route::get('add', 'RoomBookingController@getAdd');
        // Route::post('add', 'UserController@store');


        // Route::get('edit/{id}', 'UserController@edit');
        // Route::post('edit/{id}', 'UserController@update');

        // Route::post('delete/{id}', 'UserController@delete');
    });

    Route::group(['prefix'=>'ajax'],function(){
		Route::get('room/{idHotel}','AjaxController@getRoom');
	});
});