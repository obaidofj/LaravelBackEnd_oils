<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsDataController;
use App\Http\Controllers\CustDataController;
use App\Http\Controllers\MaintinanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;

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

// header('Access-Control-Allow-Origin:  *');
// header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/v1/customers_data/idno/{id}', 'App\Http\Controllers\CustDataController@getById')
->name('getById');

Route::prefix('/v1')->group(function () {

    Route::resource('cars_data', CarsDataController::class);

    Route::resource('customers_data', CustDataController::class);

    Route::resource('maintinance_data', MaintinanceController::class);

    Route::resource('users', UsersController::class);

    //Route::post('user',['uses'=>'App\Http\Controllers\AuthController@store']);

    //Route::post('user/signin',['uses'=>'App\Http\Controllers\AuthController@signin']);

});


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//  return $request->user();
//});

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => '/v1/auth'

], function ($router) {

    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh')->name('refresh');
    Route::post('me', 'AuthController@me')->name('me');
    //Route::post('user','AuthController@store');

});
