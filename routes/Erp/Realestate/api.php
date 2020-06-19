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
Route::prefix('/masters')->group( function() {
Route::get('/types','MasterController@types');
Route::post('/create','MasterController@create');
Route::get('/list/{type}','MasterController@list');
});
Route::prefix('/properties')->group( function() {
Route::post('/create','PropertyController@create');
Route::get('/list','PropertyController@list');
});
Route::prefix('/units')->group( function() {
Route::post('/create','UnitController@create');
Route::get('/list','UnitController@list');
});
Route::prefix('/tenants')->group( function() {
Route::post('/create','TenantController@create');
Route::get('/list','TenantController@list');
});
Route::prefix('/contracts')->group( function() {
Route::post('/create','ContractController@create');
Route::get('/list','ContractController@list');
});


