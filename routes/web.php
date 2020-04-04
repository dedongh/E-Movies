<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/genre/{slug}', 'Site\GenreController@show')->name('genre.show');

Route::get('/movies/{slug}', 'Site\MovieController@show')->name('movie.show');
Route::get('/movies', 'Site\MovieController@all')->name('movie.all');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/reviews', 'Site\ReviewController@create')->name('review.add');

});

Auth::routes();
require 'admin.php';
