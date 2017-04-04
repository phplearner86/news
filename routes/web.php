<?php


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index');

// Articles
Route::resource('articles', 'ArticleController');
