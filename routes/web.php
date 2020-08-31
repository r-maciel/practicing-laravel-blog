<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/profile/{user}', 'UserController@index')->name('users.index')->middleware('profile.owner');
Route::get('/me/{user}', 'UserController@index')->name('me.index')->middleware('profile.owner');

Route::get('/', 'WelcomeController@index')->name('principal');

Route::get('categories/{category}/posts', 'CategoryController@show')->name('categories.posts.show');

Route::get('/search', 'SearchController@search')->name('search');

Route::resource('posts', 'PostController')->except('index');


