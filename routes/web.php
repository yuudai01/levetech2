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


Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'PostController@index');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::put('/posts/{post}', 'PostController@update');
    Route::get('/categories/{category}', 'CategoryController@index');
    Route::get('/posts/PR/{user}', 'PostController@PR');
    Route::get('/posts/PRcreate', 'PostController@PRcreate');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','PostController@index')
    ->name('posts.index');