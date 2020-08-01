<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/index', function () {
//     return view('layouts.main');
// });

Route::view('/index', 'index');
Route::view('/movie', 'show');

Route::get('/','MoviesController@index')->name('movies.index');
Route::get('/movies/{movie}','MoviesController@show')->name('movies.show');
