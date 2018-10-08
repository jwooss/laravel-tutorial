<?php


use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index');
Route::resource('articles', 'ArticlesController');