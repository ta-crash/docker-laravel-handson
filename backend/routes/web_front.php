<?php

Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
    Route::get('/', 'LoginController@index')->name('index');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['as' => 'user.'], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/create', 'UserController@create')->name('create');
    Route::post('/store', 'UserController@store')->name('store');
    Route::get('/edit/{user}', 'UserController@edit')->name('edit');
    Route::post('/update/{user}', 'UserController@update')->name('update');
    Route::post('/destroy/{user}', 'UserController@destroy')->name('destroy');
});