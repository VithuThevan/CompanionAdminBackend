<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompleteOrderController;
use App\Http\Controllers\OngoingOrderController;

use App\Http\Controllers\DriverVehicle;
use App\Http\Controllers\CompanyController1;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\vehicle;
use App\Models\CompletedOrder;
use App\Mail\testmail;

/* |------------------------------------------------------------- | API Routes |----------------------------------------------------------------------------*/

//company
Route::get('/companys', [CompanyController1::class , 'index1']);
Route::delete('delete-company/{id}', [CompanyController1::class , 'destroy']);
Route::get('/edit-company/{id}', [CompanyController1::class , 'search']);
Route::post('/update-company/{id}', [CompanyController1::class , 'update']);

//driver
Route::get('/driver', [DriverController::class , 'index1']);
Route::delete('delete-driver/{id}', [DriverController::class , 'destroy']);
Route::get('/edit-driver/{id}', [DriverController::class , 'search']);
Route::post('/update-driver/{id}', [DriverController::class , 'update']);

//vehicleowner
Route::get('/vehicleowner', [DriverVehicle::class , 'index1']);
Route::delete('delete-vehicleowner/{id}', [DriverVehicle::class , 'destroy']);
Route::get('/edit-vehicleowner/{id}', [DriverVehicle::class , 'search']);
Route::post('/update-vehicleowner/{id}', [DriverVehicle::class , 'update']);

//vehicle
Route::get('/vehicle', [vehicle::class , 'index1']);
Route::delete('delete-vehicle/{id}', [vehicle::class , 'destroy']);
Route::get('/edit-vehicle/{id}', [vehicle::class , 'search']);
Route::post('/update-vehicle/{id}', [vehicle::class , 'update']);

//ordercontroller
Route::get('order/id', [OrderController::class , 'search']);
Route::post('order/add', [OrderController::class , 'store']);
Route::get('vorder', [OrderController::class , 'vieworders']);
Route::get('vorder/{id}', [OrderController::class , 'viewordersbyid']);
Route::delete('delete/order/{id}', [OrderController::class, 'delete']);

//ongoing order controller
Route::get('onorder', [OngoingOrderController::class, 'vieworders']);
Route::get('onorder/{id}', [OngoingOrderController::class, 'viewordersbyid']);
Route::post('add/ongoing', [OngoingOrderController::class, 'insert']);
Route::delete('delete/ongoing/{id}', [OngoingOrderController::class, 'delete']);

//complete order controller
Route::get('complete', [CompleteOrderController::class, 'vieworders']);
Route::get('complete/{id}', [CompleteOrderController::class, 'viewordersbyid']);
Route::post('add/complete', [CompleteOrderController::class, 'insert']);
Route::get('/payment',[CompleteOrderController::class,'index']);
Route::post('/fileupload',[CompleteOrderController::class,'FileUpload']);
Route::get('/send-email',[CompleteOrderController::class,'sendEmail']);
Route::post('/reject-payment/{id}',[CompleteOrderController::class,'update']);
Route::post('/accept-payment/{id}',[CompleteOrderController::class,'update1']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
