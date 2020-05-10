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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('/users', 'AdminController@users')->name('admin.users');
        Route::get('/user/{user}/edit', 'AdminController@edit')->name('admin.user.edit');
        Route::post('/block/user', 'AdminController@blockUser')->name('admin.block.user');
        Route::delete('/delete/user', 'AdminController@deleteUser')->name('admin.delete.user');
    });

});

Route::group(['middleware' => ['auth', 'active_user']], function () {

    Route::group(['prefix' => 'post'], function () {
        Route::get('/create', 'PostsController@create')->name('post.create');
        Route::post('', 'PostsController@store')->name('post.store');
        Route::get('/{post}', 'PostsController@show')->name('post.show');
        Route::get('/{post}/edit', 'PostsController@edit')->name('post.edit');
        Route::delete('/{post}', 'PostsController@destroy')->name('post.destroy');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile.index');
        Route::get('/{profile}', 'ProfileController@show')->name('profile.show');
        Route::get('/{profile}/edit', 'ProfileController@edit')->name('profile.edit');
        Route::patch('/{profile}', 'ProfileController@update')->name('profile.update');

    });

    Route::group(['prefix' => 'comments'], function () {
        Route::post('/', 'CommentController@store')->name('comment.store');
        Route::delete('/comment', 'CommentController@destroy')->name('comments.destroy');

    });
});


