<?php

use App\User;
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

Route::middleware(['api.json', 'auth:api'])->group(function() {
    Route::get('people', 'Api\PeopleController@index');
});

Route::middleware('token_check')->group(function() {
    Route::get('people2', 'Api\PeopleController@index');
});

Route::middleware('jwt.auth')->group(function() {
    Route::get('people3', 'Api\PeopleController@index');
});
