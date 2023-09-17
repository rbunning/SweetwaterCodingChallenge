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
Route::post('/updateOrder/{orderId}', 'App\Http\Controllers\Api\OrderController@updateOrder');
Route::post('/createOrder', 'App\Http\Controllers\Api\OrderController@createOrder');
Route::get('/updateAllExpectedShipDates', 'App\Http\Controllers\Api\ExpectedShipDateController@updateAllExpectedShipDates');
Route::get('/updateExpectedShipDate/{orderId}', 'App\Http\Controllers\Api\ExpectedShipDateController@updateExpectedShipDate');
Route::get('/getSortedComments', 'App\Http\Controllers\Api\OrderCommentsController@getSortedComments');
Route::get('/user', function (Request $request) {
    return $request->user();
});
