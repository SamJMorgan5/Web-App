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
Route::get('posts', 'PostController@index')
    ->name('posts.index');

Route::get('posts/create', 'PostController@create')
    ->name('posts.create');

Route::post('posts', 'PostController@store')
    ->name('posts.store');

Route::get('posts/{id}', 'PostController@show')
    ->name('posts.show');

Route::get('posts/{id}/edit', 'PostController@edit')
    ->name('posts.edit');

Route::put('posts/{id}', 'PostController@update')
    ->name('posts.update');

Route::get('comments/{id}/edit', 'CommentController@edit')
    ->name('comments.edit');

Route::put('comments/{id}', 'CommentController@update')
    ->name('comments.update');
//Route::get('/comments', 'CommentController@page');

Route::post('comments', 'CommentController@store')->name('comments.store');

Route::delete('posts/{id}', 'PostController@destroy')
    ->name('posts.destroy');

Route::delete('comments/{id}', 'CommentController@destroy')
    ->name('comments.destroy');



Auth::routes();

Route::get('logout', 'Auth\AuthController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
