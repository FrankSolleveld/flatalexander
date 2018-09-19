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
Route::get('/', function () {
    $name = 'Frenkie';

    $age = 19;

    $tasks = [

        'Ga naar de winkel',
        'Haal een brood',
        'Betaal het brood',
        'Bak het brood thuis in de oven'

    ];

    return view('home', compact('name','age', 'tasks'));

});

// Adding news page
Route::get('/news', function () {
    return view('news');
});

// Adding laundry reservations page
Route::get('/laundry', function () {
    return view('laundry');
});

// Adding support page
Route::get('/support', function () {
    return view('support');
});

// Adding regulations page
Route::get('/regulations', function () {
    return view('regulations');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
