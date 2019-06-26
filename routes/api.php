<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List specialties
Route::get('specialties', 'API\SpecialtyController@index');

// Route::get('specialties', function (){
// 	return datatables()
//             ->eloquent(App\Specialty::select('id', 'name', 'description', 'created_at'))
//             ->toJson();
// });

// List single specialty
Route::get('specialty/{id}', 'API\SpecialtyController@show');

// List specialty areas
Route::get('specialty-areas', 'API\SpecialtyAreaController@index');
// List single specialty area
Route::get('specialty-area/{id}', 'API\SpecialtyAreaController@show');