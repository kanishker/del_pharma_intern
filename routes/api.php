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
Route::get('viewmedicine','MedicineStockController@viewMedicine')->middleware('jwtAuth');
Route::post('searchmedicine','MedicineStockController@SearchMedicine')->middleware('jwtAuth');
Route::post('add-medicine','MedicineStockController@addMedicine')->middleware('jwtAuth');
Route::put('update-medicine','MedicineStockController@updateMedicine')->middleware('jwtAuth');
Route::post('delete-medicine','MedicineStockController@deleteMedicine')->middleware('jwtAuth');

//Customer Crud
Route::get('View-customer','CustomerController@viewCustomer')->middleware('jwtAuth');
Route::post('Search-customer','CustomerController@searchCustomer')->middleware('jwtAuth');
Route::post('add-customer','CustomerController@addCustomer')->middleware('jwtAuth');
Route::put('update-customer','CustomerController@updateCustomer')->middleware('jwtAuth');
Route::post('delete-customer','CustomerController@deleteCustomer')->middleware('jwtAuth');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
