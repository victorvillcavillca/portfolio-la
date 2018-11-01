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
Route::get('/', 'Web\PageController@index')->name('index');

// Route::get('/', function () {
//     return view('welcome');
//     // return redirect()->route('blog');
// });

Route::view('gradient', 'gradient');

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

#Resource
Route::get('/resources', 'Web\PageController@resources')->name('resources');
Route::get('/resource/{slug}', 'Web\PageController@resource')->name('resource');
Route::get('/resource-category/{slug}', 'Web\PageController@resourceCategory')->name('resource-category');

Route::apiResource('thoughts', 'ThoughtController');

#infinite scroll
Route::get('posts', 'PostController@index');

Route::group(['middleware'=>['auth']], function (){
   Route::post('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
   Route::post('comment/{post}','CommentController@store')->name('comment.store');
});

Route::prefix('admin')->group(function () {
    // Route::view('/', 'auth.admin-login');
    Route::view('/login', 'auth.admin-login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::get('logout','Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    # Home
    // Route::get('/', 'Admin\HomeController@index')->name('admin');
    Route::view('/', 'admin.home');
    Route::view('home', 'admin.home')->name('admin');

    Route::resource('tags', 	   'Admin\TagController');
	Route::resource('categories',  'Admin\CategoryController');
    Route::resource('posts',       'Admin\PostController');

    #Specialty Areas
    Route::get('specialty-areas/data', 'Admin\SpecialtyAreaController@data');
	Route::resource('specialty-areas', 'Admin\SpecialtyAreaController');

    #Specialties
    Route::get('specialties/data', 'Admin\SpecialtyController@data');
    Route::resource('specialties', 'Admin\SpecialtyController');

    #Evaluation Categories
    Route::get('evaluation-categories/data', 'Admin\EvaluationCategoryController@data');
    Route::resource('evaluation-categories', 'Admin\EvaluationCategoryController');

    #Evaluations
    Route::get('evaluations/data', 'Admin\EvaluationController@data');
    Route::resource('evaluations', 'Admin\EvaluationController');

    #Questions
    Route::get('questions/data', 'Admin\QuestionController@data');
    Route::resource('questions', 'Admin\QuestionController');
    // Route::resource('home', 'Admin\HomeController');

    #Inscriptions
    Route::get('inscriptions/data', 'Admin\InscriptionController@data');
    Route::resource('inscriptions', 'Admin\InscriptionController');

    //Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');
    //Users
    Route::get('users', 'UserController@index')->name('users.index')
        ->middleware('permission:users.index');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
        ->middleware('permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
        ->middleware('permission:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');
    //Products
    Route::post('products/store', 'ProductController@store')->name('products.store')
        ->middleware('permission:products.create');

    Route::get('products', 'ProductController@index')->name('products.index')
        ->middleware('permission:products.index');

    Route::get('products/create', 'ProductController@create')->name('products.create')
        ->middleware('permission:products.create');

    Route::put('products/{product}', 'ProductController@update')->name('products.update')
        ->middleware('permission:products.edit');

    Route::get('products/{product}', 'ProductController@show')->name('products.show')
        ->middleware('permission:products.show');

    Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
        ->middleware('permission:products.destroy');

    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
        ->middleware('permission:products.edit');
});

// Route::name('admin')->prefix('admin')->middleware('auth')->group(base_path('routes/admin.php'));

// ['prefix' => 'admin', 'middleware' => 'auth']