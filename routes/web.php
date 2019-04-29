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
// Authentication Routes..
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/', function () {
    return view('welcome');
});
// user book controller
Route::get('books/{book}', ['as' => 'book.show', 'uses' => 'User\BooksController@show']);
Route::resource('comments', 'User\CommentController');
// admin books controller

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function () {
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::resources([
        // 'roles' => 'Admin\RolesController',
        'categories' => 'Admin\CategoryController',
        'books'=>'Admin\BooksController'

    ]);
});
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


