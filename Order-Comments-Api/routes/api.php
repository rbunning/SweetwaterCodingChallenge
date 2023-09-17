<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/UpdateOrder/{orderId}', 'App\Http\Controllers\Api\OrderController@UpdateOrder');
Route::post('/CreateOrder', 'App\Http\Controllers\Api\OrderController@CreateOrder');
Route::get('/UpdateAllExpectedShipDates', 'App\Http\Controllers\Api\ExpectedShipDateController@UpdateAllExpectedShipDates');
Route::get('/UpdateExpectedShipDate/{orderId}', 'App\Http\Controllers\Api\ExpectedShipDateController@UpdateExpectedShipDate');
Route::get('/GetSortedComments', 'App\Http\Controllers\Api\OrderCommentsController@GetSortedComments');
Route::get('/user', function (Request $request) {
    return $request->user();
});
