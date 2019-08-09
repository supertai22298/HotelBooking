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
Route::get('/hotel-grid-left-sidebar', function () {
    return view('page.hotel-grid-left-sidebar');
});
Route::get('/hotel-detail',function(){
    return view('page.hotel-detail');
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
Route::get('/wishlist', function () {
    return view('page.wishlist');
});
Route::get('/contact-us', function () {
    return view('page.contact-us');
});
Route::get('/error-page', function () {
    return view('page.error-page');
});
Route::get('/forgot-password', function () {
    return view('page.forgot-password');
});
Route::get('/cards', function () {
    return view('page.cards');
});
Route::get('/bookings', function () {
    return view('page.bookings');
});
Route::get('/about-us', function () {
    return view('page.about-us');
});
Route::get('/coming-soon', function () {
    return view('page.coming-soon');
});