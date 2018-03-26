<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@landing');

Auth::routes();

Route::get('links', 'LinksController@index');
Route::post('links', 'LinksController@store');
Route::delete('links/{link}', 'LinksController@destroy');
