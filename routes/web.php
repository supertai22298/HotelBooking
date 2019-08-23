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

    Route::group(['prefix' => 'user'], function(){
        Route::get('/', 'UserController@view');

        Route::get('add', 'UserController@create');
        Route::post('add', 'UserController@store');


        Route::get('edit/{id}', 'UserController@edit');
        Route::post('edit/{id}', 'UserController@update');

        Route::post('delete/{id}', 'UserController@delete');
    });

    Route::group(['prefix' => 'room-type'], function(){
        Route::get('/', 'RoomTypeController@view');

        Route::get('add', 'RoomTypeController@create')->name('get-room-type-create');
        Route::post('add', 'RoomTypeController@store')->name('post-room-type-store');


        Route::get('edit/{id}', 'RoomTypeController@edit');
        Route::post('edit/{id}', 'RoomTypeController@update');

        Route::post('delete/{id}', 'RoomTypeController@delete');
    });

});