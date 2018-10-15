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
// Adding routes

// Adding homepage
Route::get('/', 'HomeController@index');

// Adding news page
Route::get('/news', function () {
    return view('news');
})->name('news');

// Adding laundry reservations page
Route::get('/laundry', 'ReservationsController@index')->name('laundry')->middleware('auth');

// Adding support page
Route::get('/support', function () {
    return view('support');
})->name('support');

// Adding regulations page
Route::get('/regulations', function () {
    return view('regulations');
})->name('regulations');

// Adding admin page
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/create-prod', 'ProductsController@create')->name('create-prod');
Route::post('/products', 'ProductsController@store');
Route::get('/products/{product}','ProductsController@show');
Route::get('/admin/users', 'AdminController@userShow')->name('users');

Route::get('/reservations', 'ReservationsController@index');

Auth::routes();


