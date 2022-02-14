<?php

Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
    Route::get('/', 'LoginController@index')->name('index');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['as' => 'admin.'], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/create', 'AdminController@create')->name('create');
    Route::post('/store', 'AdminController@store')->name('store');
    Route::get('/edit/{admin}', 'AdminController@edit')->name('edit');
    Route::post('/update/{admin}', 'AdminController@update')->name('update');
    Route::post('/destroy/{admin}', 'AdminController@destroy')->name('destroy');
});