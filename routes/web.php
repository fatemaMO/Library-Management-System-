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

Route::get('books/{book}', ['as' => 'book.show', 'uses' => 'userControllers\BookController@show']);
Route::resource('comments', 'CommentController');
Route::resource('admin/books', 'adminControllers\BookController');
Auth::routes();

 