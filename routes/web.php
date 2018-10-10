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
    // return redirect()->route('blog');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blog', 'Web\PageController@blog')->name('blog');
Route::get('/post/{slug}', 'Web\PageController@post')->name('post');
Route::get('/category/{slug}', 'Web\PageController@category')->name('category');
Route::get('/tag/{slug}', 'Web\PageController@tag')->name('tag');

#Specialty
Route::get('/specialties', 'Web\PageController@specialties')->name('specialties');
Route::get('/specialty/{slug}', 'Web\PageController@specialty')->name('specialty');
Route::get('/specialty-area/{slug}', 'Web\PageController@specialtyArea')->name('specialty-area');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    # Home
    // Route::get('/', 'Admin\HomeController@index')->name('admin');
    Route::view('/', 'admin.home');
    Route::view('home', 'admin.home')->name('admin');

    Route::resource('tags', 		'Admin\TagController');
	Route::resource('categories', 	'Admin\CategoryController');
	Route::resource('posts', 		'Admin\PostController');
    // Route::resource('home', 'Admin\HomeController'); 
});