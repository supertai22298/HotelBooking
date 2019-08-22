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

Route::get('/', function () {
    return view('page.index');
});
Route::get('/hotel-grid-left-sidebar', function () {
    return view('page.hotel_grid_left_sidebar');
});
Route::get('/hotel-detail',function(){
    return view('page.hotel_detail');
});
Route::get('/login', function () {
    return view('page.login');
});
Route::get('/registration', function () {
    return view('page.registration');
});
Route::get('/thank-you', function () {
    return view('page.thank_you');
});
Route::get('/user-profile', function () {
    return view('page.user_profile');
});
Route::get('/dashboard', function () {
    return view('page.dashboard');
});
Route::get('/wishlist', function () {
    return view('page.wishlist');
});
Route::get('/contact-us', function () {
    return view('page.contact_us');
});
Route::get('/forgot-password', function () {
    return view('page.forgot_password');
});
Route::get('/cards', function () {
    return view('page.cards');
});
Route::get('/bookings', function () {
    return view('page.bookings');
});
Route::get('/about-us', function () {
    return view('page.about_us');
});
Route::get('/coming-soon', function () {
    return view('page.coming_soon');
});

//  admin
Route::get('/admin',function(){
  return view('admin.index');
})->name('admin');

Route::get('/quan-ly-nguoi-dung',function(){
  return view('admin.users_management.user_management');
})->name('quan-ly-nguoi-dung');

Route::get('/them-nguoi-dung',function(){
  return view('admin.users_management.add_user');
})->name('them-nguoi-dung');
Route::post('/post-them-nguoi-dung', 'RoomTypeController@create')->name('post-them-nguoi-dung');


Route::get('/xoa-nguoi-dung',function(){
  //
})->name('xoa-nguoi-dung');

Route::get('/chinh-sua-nguoi-dung',function(){
  return view('admin.users_management.edit_user');
})->name('chinh-sua-nguoi-dung');