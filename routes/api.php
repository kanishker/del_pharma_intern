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
//Auth routes
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');

//Inventory Crud
Route::get('viewmedicine','MedicineStockController@viewMedicine');
Route::post('searchmedicine','MedicineStockController@SearchMedicine');
Route::post('add-medicine','MedicineStockController@addMedicine');
Route::put('update-medicine','MedicineStockController@updateMedicine');
Route::post('delete-medicine','MedicineStockController@deleteMedicine');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
