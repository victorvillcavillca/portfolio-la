<?php
Route::name('admin')->prefix('admin')->group(base_path('routes/admin.php'));

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

    Route::resource('tags',        'Admin\TagController');
    Route::resource('categories',  'Admin\CategoryController');
    Route::resource('posts',       'Admin\PostController');

    Route::get('specialty-areas/data', 'Admin\SpecialtyAreaController@data');
    Route::resource('specialty-areas', 'Admin\SpecialtyAreaController');

    Route::get('specialties/data', 'Admin\SpecialtyController@data');
    Route::resource('specialties', 'Admin\SpecialtyController');
    // Route::resource('home', 'Admin\HomeController');

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