<?php

Auth::routes(['verify' => true]);


Route::get('/', 'HomeController@index')
  ->name('index');
Route::get('/travel-packages', 'HomeController@travelPackages')
  ->name('travelPackages');
Route::get('/travel-packages/search', 'HomeController@travelSearch')
  ->name('travelSearch');
Route::get('/travel-package/{slug}', 'DetailController@index')
  ->name('detail');


Route::get('/my-profile', 'UserController@index')
  ->name('myProfile')
  ->middleware(['auth']);

Route::get('/my-profile/edit/{id}', 'UserController@edit')
  ->name('editProfile')
  ->middleware(['auth']);

Route::post('/my-profile/update/{id}', 'UserController@update')
  ->name('updateProfile')
  ->middleware(['auth']);


Route::post('/checkout/process/{id}', 'Admin\CheckoutController@process')
  ->name('checkoutProcess')
  ->middleware(['auth', 'verified']);

Route::get('/checkout/{id}', 'Admin\CheckoutController@index')
  ->name('checkout')
  ->middleware(['auth', 'verified']);

// Route::post('/checkout/{id}', 'Admin\CheckoutController@process')
//   ->name('checkoutProcess')
//   ->middleware(['auth', 'verified']);

Route::post('/checkout/create/{detailId}', 'Admin\CheckoutController@create')
  ->name('checkoutCreate')
  ->middleware(['auth', 'verified']);

Route::get('/checkout/remove/{detailId}', 'Admin\CheckoutController@remove')
  ->name('checkoutRemove')
  ->middleware(['auth', 'verified']);

Route::get('/checkout/confirm/{id}', 'Admin\CheckoutController@success')
  ->name('checkoutSuccess')
  ->middleware(['auth', 'verified']);



Route::prefix('admin-travelQ')
  ->namespace('Admin')
  ->middleware('auth', 'admin')
  ->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('travel-package', 'TravelPackageController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('transaction', 'TransactionController');
  });
