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

//Front

Route::get('/', function () {
    return view('front.home');
});
Route::get('/home', function () {
    return view('front.home');
})->name('home');

Route::get('pages/aboutfutshall', function () {
    return view('front.pages.aboutfutshall');
});



Auth::routes();

Route::get('/auths', 'HomeController@index')->name('auths');
Route::get('/logout','HomeController@logout');


//ARENARa
Route::get('/arena','ArenaController@index');
Route::get('/setting','ArenaController@create');
Route::post('/setting/update/{id}','ArenaController@update');