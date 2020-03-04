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

//Guest routes
Route::middleware('guest')->group(function (){
    Route::get('/', 'AuthController@login')->name('login');
    Route::post('/sign-in', 'AuthController@signIn')->name('sign-in');
    Route::get('/register', 'AuthController@register')->name('register');
    Route::post('/sign-up', 'AuthController@signUp')->name('sign-up');
});

//User routes
Route::middleware('auth')->group(function (){
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::get('/home', 'ProfileController@index')->name('home');
    Route::delete('/delete-account', 'ProfileController@destroy')->name('delete-account');
    Route::resource('/post', 'PostController');
    Route::resource('/comment', 'CommentController');
});
