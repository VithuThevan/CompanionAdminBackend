<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Companion_Controlle;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompleteOrderController;
use App\Http\Controllers\OngoingOrderController;

/* |------------------------------------------------------------- | API Routes |----------------------------------------------------------------------------*/

Route::get('/vehicleowner', [Companion_Controlle::class , 'index2']);
Route::get('/companys', [Companion_Controlle::class , 'index1']);
Route::get('/drivers', [Companion_Controlle::class , 'index']);
Route::post('/add-drivers', [Companion_Controlle::class , 'store']);
Route::get('/edit-drivers/{id}', [Companion_Controlle::class , 'search']);
Route::post('/update-drivers/{id}', [Companion_Controlle::class , 'update']);
Route::delete('delete-drivers/{id}', [Companion_Controlle::class , 'destroy']);

Route::get('order/id', [OrderController::class , 'search']);
Route::post('order/add', [OrderController::class , 'store']);
Route::get('vorder', [OrderController::class , 'vieworders']);
Route::get('vorder/{id}', [OrderController::class , 'viewordersbyid']);
Route::delete('delete/order/{id}', [OrderController::class, 'delete']);

Route::get('onorder', [OngoingOrderController::class, 'vieworders']);
Route::get('onorder/{id}', [OngoingOrderController::class, 'viewordersbyid']);
Route::post('add/ongoing', [OngoingOrderController::class, 'insert']);
Route::delete('delete/ongoing/{id}', [OngoingOrderController::class, 'delete']);

Route::get('complete', [CompleteOrderController::class, 'vieworders']);
Route::get('complete/{id}', [CompleteOrderController::class, 'viewordersbyid']);
Route::post('add/complete', [CompleteOrderController::class, 'insert']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
