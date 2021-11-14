<?php

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

Route::get('/', function () {
    return view ('home');
});
Route::resource('/product','ProductController');

Route::get('search','ProductController@search');
Route::post("getsearch",'ProductController@getsearch');



Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

