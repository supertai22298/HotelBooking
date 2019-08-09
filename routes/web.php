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

Route::get('/home', function () {
    return view('page.index');
});
Route::get('/index', function () {
    return view('page.hotel-grid-left-sidebar');
});
Route::get('/login', function () {
    return view('page.login');
});
Route::get('/registration', function () {
    return view('page.registration');
});
Route::get('/thank-you', function () {
    return view('page.thank-you');
});
Route::get('/user-profile', function () {
    return view('page.user-profile');
});
Route::get('/dashboard', function () {
    return view('page.dashboard');
});
