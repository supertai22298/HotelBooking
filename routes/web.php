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
        Route::get('/', 'UserController@viewAllUsers')->name('allUsers');

        Route::get('add', 'UserController@create')->name('addUser');
        Route::post('add', 'UserController@store')->name('store');


        Route::get('edit/{id}', 'UserController@edit')->name('editUser');
        Route::post('edit/{id}', 'UserController@update')->name('upadteUser');

        Route::get('delete/{id}', 'UserController@delete')->name('deleteUser');
    });

    Route::group(['prefix' => 'room-type'], function(){
        Route::get('/', 'RoomTypeController@view');

        Route::get('add', 'RoomTypeController@create')->name('get-room-type-create');
        Route::post('add', 'RoomTypeController@store')->name('post-room-type-store');

        Route::get('edit/{id}', 'RoomTypeController@edit')->name('get-room-type-edit');
        Route::post('edit/{id}', 'RoomTypeController@update')->name('post-room-type-update');

        Route::post('delete/{id}', 'RoomTypeController@delete')->name('post-room-type-delete');
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

});