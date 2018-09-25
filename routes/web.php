<?php

use App\Task;
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

    $tasks = DB::table('tasks')->get();

    return view('tasks.index', compact( 'tasks'));

});

Route::get('/tasks', function () {

    // Eloquent syntax. BIn the top we use App\Task so we don't have to repeat App\ everytime we use an Eloquent query,
    $tasks = Task::all();

    return view('tasks.index', compact( 'tasks'));

});

Route::get('/tasks/{task}', function ($id) {

//    $task = DB::table('tasks')->find($id);

    $task = Task::find($id);

    return view('tasks.show', compact('task'));

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
