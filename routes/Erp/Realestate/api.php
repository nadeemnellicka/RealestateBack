<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/user')->middleware('auth:api')->group( function() {
Route::get('/details','LoginController@details');
Route::post('/logout','LoginController@logout');
});
Route::prefix('/masters')->middleware('auth:api')->group( function() {
Route::get('/types','MasterController@types');
Route::post('/create','MasterController@create');
Route::get('/list/{type}','MasterController@list');
});
Route::prefix('/properties')->middleware('auth:api')->group( function() {
Route::post('/create','PropertyController@create');
Route::get('/list','PropertyController@list');
Route::put('/update','PropertyController@update');
});
Route::prefix('/units')->middleware('auth:api')->group( function() {
Route::post('/create','UnitController@create');
Route::put('/update','UnitController@update');
Route::get('/list','UnitController@list');
});
Route::prefix('/tenants')->middleware('auth:api')->group( function() {
Route::post('/create','TenantController@create');
Route::put('/update','TenantController@update');
Route::get('/list','TenantController@list');
});
Route::prefix('/contracts')->middleware('auth:api')->group( function() {
Route::post('/create','ContractController@create');
Route::put('/create','ContractController@create');
Route::get('/list','ContractController@list');
});

Route::prefix('/tracker')->middleware('auth:api')->group( function() {
Route::get('/list','RentalTrackerController@list');
Route::post('/collection','RentalTrackerController@collection');
});
Route::prefix('/report')->group( function() {
Route::get('/property','ReportController@propertyReport');
Route::get('/unit/{unit_id}','ReportController@unitReport');
});


