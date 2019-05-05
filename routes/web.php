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

/**
 * login and reset password
 */

// Authentication Routes..
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm');

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/**
 * Admin Routes
 */

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    //admiiiinnnnnn

    Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function () {
        Route::resources([
            'categories' => 'Admin\CategoryController',
            'books' => 'Admin\BooksController',
        ]);

        Route::resource('users', 'Admin\UsersController')->except('index', 'show');
        Route::get('users/{type}','Admin\UsersController@index');
        Route::get('/profit', 'Admin\ProfitsController@calculateProfit');
        Route::get('/admin/users/activate/{id}', 'Admin\UsersController@activate')->name('users.active');
        //end of admin routes
    });
});

/**
 * User Routes
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'user'], function () {
        Route::resource('comments', 'CommentController');
        Route::post('/like', [
            'uses' => 'BookController@bookLikeBook',
            'as' => 'like'
        ]);
        Route::get("favorite","FavoriteViewController@index");
        Route::get('books/{book}', ['as' => 'book.show', 'uses' => 'User\BooksController@show']);
        Route::resource('comments', 'User\CommentController');
        Route::get('/webBooks', 'BookController@webBooks');
        Route::get('/getBooks/{id}/', 'BookController@categoryBooks')->name('getBooks');
        Route::post('bookSearch', 'BookController@search')->name('bookSearch');
        Route::get('/getLeased', 'BookController@getLeased');
        Route::get('/orderBooks/{field}/','BookController@orderBooks')->name('orderBooks');
        Route::post('/lease', 'BookController@lease')->name('lease');
    });
});



