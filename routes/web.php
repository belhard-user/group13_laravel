<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');

/*
 * Database testing
 */
Route::group(['prefix' => 'db'], function(){
    Route::get('insert', 'DBController@insert');
    Route::get('select', 'DBController@select');
    Route::get('update', 'DBController@update');
    Route::get('delete', 'DBController@delete');
});
