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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function () {
        Route::resources([
            'users' => 'Admin\UsersController',
            'categories' => 'Admin\CategoryController',
            'books' => 'Admin\BooksController',

        ]);
        Route::get('/admin/users/activate/{id}', 'Admin\UsersController@activate')->name('users.active');
    });


});



Route::post('/like', [
    'uses' => 'BookController@bookLikeBook',
    'as' => 'like'
]);

Route::get("favorite","FavoriteViewController@index");

Route::resource('comments', 'CommentController');

// user book controller
Route::get('books/{book}', ['as' => 'book.show', 'uses' => 'User\BooksController@show']);
Route::resource('comments', 'User\CommentController');


Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function () {
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::resources([
        'roles' => 'Admin\RolesController',

    ]);
});
Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/webBooks', 'BookController@webBooks');
Route::get('/getBooks/{id}/', 'BookController@categoryBooks')->name('getBooks');
Route::post('bookSearch', 'BookController@search')->name('bookSearch');
Route::get('/getLeased', 'BookController@getLeased');
