<?php
// Use App\Datatables\UserDataTable;

Route::resource('users', 'UsersController');
// Route::get('users', function(UserDataTable $dataTable) {

//     return $dataTable->render('admin.matters.read');
//     // return view('admin.matters.read', compact('html'));
// });

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

#Login Socialite
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

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

    Route::get('posts/data', 'Admin\PostController@data');
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

    #Matters
    Route::get('matters/data', 'Admin\MatterController@data');
    Route::resource('matters', 'Admin\MatterController');

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

    #Managements
    // Route::get('managements/data', 'Admin\ManagementController@data');
    Route::resource('managements', 'Admin\ManagementController');

    #Resource Categories
    // Route::get('managements/data', 'Admin\ManagementController@data');
    Route::resource('resource-categories', 'Admin\ResourceCategoryController');

    #Resources
    Route::get('resources/data', 'Admin\ResourceController@data');
    Route::resource('resources', 'Admin\ResourceController');

    //Roles
    Route::get('roles/data', 'Admin\RoleController@data');
    Route::resource('roles', 'Admin\RoleController');
    //Users
    Route::get('users/data', 'Admin\UserController@data');
    Route::resource('users', 'Admin\UserController');


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