<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('/post/store', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('/post', 'PostController@index')->name('post.index')->middleware('auth');
Route::get('post/{post}/edit', 'PostController@edit')->middleware('auth');
Route::patch('/post/{post}', 'PostController@update')->name('post.update');
Route::post('/post/{post}','PostController@destroy')->middleware('auth');