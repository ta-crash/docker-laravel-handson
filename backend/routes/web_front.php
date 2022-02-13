<?php

use App\Http\Controllers\Front\UserController;

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

Route::group(['as' => 'user.'], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/create', 'UserController@create')->name('create');
    Route::post('/store', 'UserController@store')->name('store');
    Route::get('/edit/{user}', 'UserController@edit')->name('edit');
    Route::post('/update/{user}', 'UserController@update')->name('update');
    Route::post('/destroy/{user}', 'UserController@destroy')->name('destroy');
});