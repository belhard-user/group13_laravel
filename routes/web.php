<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');

Route::get('validate', 'ValidateControlle@index');
Route::get('validate/form', 'ValidateControlle@form');
Route::post('validate/form', 'ValidateControlle@store');

Route::get('blog/tag/{tag_slug}', 'TagController@index')->name('tag');

/*
 * Article area
 */
Route::group(['prefix' => 'blog'], function(){
    Route::get('/', 'ArticleController@index')->name('article.index');
    Route::get('/{article}/show', 'ArticleController@show')->name('article.show');
    Route::get('/{article}/edit', 'ArticleController@edit')->name('article.edit');
    Route::put('/{article}/update', 'ArticleController@update')->name('article.update');
    Route::get('add', 'ArticleController@add')->name('article.add');
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
    Route::get('specialties', 'DBController@specialties');
    Route::get('many-to-many', 'DBController@manyToMany');
});

/*
 * Request area
 */
Route::group(['prefix' => 'request'], function(){
    Route::get('/', 'RequestController@index');
    Route::post('/', 'RequestController@putData');
});

Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'DashboardController@index')->name('dashboard.main');
});
