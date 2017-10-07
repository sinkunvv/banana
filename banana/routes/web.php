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


Route::get('/','BananaController@index')->name('maker.index');
Route::post('/share','Twitter\TwitterController@sign_in')->name('twitter.login');
Route::get('/callback','Twitter\TwitterController@callback')->name('twitter.callback');
Route::get('/tweet','Twitter\TwitterController@post')->name('twitter.post');
Route::post('/generate','BananaController@create')->name('maker.generate');
Route::get('/agreement', function () {
    return view('agree');
});
