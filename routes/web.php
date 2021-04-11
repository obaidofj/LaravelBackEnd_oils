<?php



use Illuminate\Support\Facades\Route;



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


Route::get('/', [
    'uses' => 'App\Http\Controllers\AdController@getAds',
    'as' => 'root'
]);

Route::get('get_query', [
    'uses' => 'App\Http\Controllers\AdController@get_queries',
    'as' => 'get_qy'
]);

Route::get('Ad/{id}', [
    'uses' => 'App\Http\Controllers\AdController@getAd',
    'as' => 'ad'
]);

Route::get('q_cust_cars/{id}', [
    'uses' => 'App\Http\Controllers\AdController@q_cust_cars',
    'as' => 'q_cust_cars'
]);

Route::get('q_cust_jobs/{id}', [
    'uses' => 'App\Http\Controllers\AdController@q_cust_jobs',
    'as' => 'q_cust_jobs'
]);

Route::get('q_job_custrs/{id}', [
    'uses' => 'App\Http\Controllers\AdController@q_job_custrs',
    'as' => 'q_job_custrs'
]);

Route::get('about', function () {
    return view('others.about');
})->name('about');

Route::get('/customers', [
    'uses' => 'App\Http\Controllers\AdController@cust_info',
    'as' => 'customers'
   ]);

/* Route::get('admin', function () {
    return view('admin.index');
})->name('admin'); */


Route::group(['prefix' => 'admin'], function () {
    Route::get('', [
        'uses' => 'App\Http\Controllers\AdController@getAdmin',
        'as' => 'admin.index'
    ]);

    Route::get('adslist', [
        'uses' => 'App\Http\Controllers\AdController@getAdminAds',
        'as' => 'admin.toedit'
    ]);

    Route::get('create', [
        'uses' => 'App\Http\Controllers\AdController@getAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::Post('create', [
        'uses' => 'App\Http\Controllers\AdController@AdAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'App\Http\Controllers\AdController@getAdminEdit',
        'as' => 'admin.edit'
    ]);

Route::get('delete/{id}', [
        'uses' => 'App\Http\Controllers\AdController@AdDelete',
        'as' => 'admin.delete'
    ]);

    Route::Post('edit', [
        'uses' => 'App\Http\Controllers\AdController@AdAdminUpdate',
        'as' => 'admin.update'
    ]);
//
    Route::get('create_cust', [
        'uses' => 'App\Http\Controllers\AdController@addCust',
        'as' => 'addCustomer'
    ]);

    Route::post('create_cust', [
        'uses' => 'App\Http\Controllers\AdController@addCust2',
        'as' => 'addCustomer'
    ]);

    Route::get('create_car', [
        'uses' => 'App\Http\Controllers\AdController@addCar',
        'as' => 'addCar'
    ]);

    Route::post('create_car', [
        'uses' => 'App\Http\Controllers\AdController@addCar2',
        'as' => 'addCar'
    ]);

    Route::get('add_job', [
        'uses' => 'App\Http\Controllers\AdController@addJob',
        'as' => 'carTypes'
    ]);

    Route::get('add_maintinance', [
        'uses' => 'App\Http\Controllers\AdController@addMaint',
        'as' => 'addMaintinance'
    ]);

Route::get('job_types', [
        'uses' => 'App\Http\Controllers\AdController@jobTypes',
        'as' => 'jobTypes'
    ]);
Route::get('cust_job', [
        'uses' => 'App\Http\Controllers\AdController@addJobCust',
        'as' => 'cutomers-jobs'
    ]);


});
