<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');

/*
 * Article area
 */
Route::group(['prefix' => 'blog'], function(){
    Route::get('/', 'ArticleController@index')->name('article.index');
    Route::get('/{article}/show', 'ArticleController@show')->name('article.show');
    Route::get('/{article}/edit', 'ArticleController@edit')->name('article.edit');
    Route::put('/{article}/update', 'ArticleController@update')->name('article.update');
    Route::get('add', 'ArticleController@add');
    Route::post('add', 'ArticleController@store')->name('article.store');
});

/*
 * Database testing
 */
Route::group(['prefix' => 'db'], function(){
    Route::get('insert', 'DBController@insert');
    Route::get('select', 'DBController@select');
    Route::get('update', 'DBController@update');
    Route::get('delete', 'DBController@delete');
    Route::get('model', 'DBController@model');
    Route::get('create-record', 'DBController@createRecordToRelationTable');
});

/*
 * Request area
 */
Route::group(['prefix' => 'request'], function(){
    Route::get('/', 'RequestController@index');
    Route::post('/', 'RequestController@putData');
});
