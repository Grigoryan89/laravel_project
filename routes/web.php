<?php

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



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('post/create','PostsController@create')->name('post.create');
Route::post('post','PostsController@store')->name('post.store');
Route::get('post/{post}','PostsController@show')->name('post.show');
Route::get('post/{post}/edit','PostsController@edit')->name('post.edit');

Route::get('/profile','ProfileController@index')->name('profile.index');
Route::get('/profile/{profile}','ProfileController@show')->name('profile.show');
Route::get('profile/{profile}/edit','ProfileController@edit')->name('profile.edit');
Route::patch('profile/{profile}','ProfileController@update')->name('profile.update');

