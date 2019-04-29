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

Route::resource('books', 'BookController');

Route::post('/like', [
    'uses' => 'BookController@bookLikeBook',
    'as' => 'like'
]);

Route::get("favorite","FavoriteViewController@index");

Route::resource('comments', 'CommentController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
