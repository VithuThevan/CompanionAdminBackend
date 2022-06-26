<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController1;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\Companion_Controlle;

/* |------------------------------------------------------------- | API Routes |----------------------------------------------------------------------------*/

//Route::get('/company', [CompanyController1::class , 'index']);
//Route::post('/add-student', [CompanyController1::class , 'store']);
//Route::get('/edit-student/{id}', [CompanyController1::class , 'search']);
//Route::post('/update-student/{id}', [CompanyController1::class , 'update']);
//Route::delete('delete-student/{id}', [CompanyController1::class , 'destroy']);

Route::get      ('/companys',           [Companion_Controlle::class , 'index1'  ]);
Route::get      ('/drivers',            [Companion_Controlle::class , 'index'   ]);
Route::post     ('/add-drivers',        [Companion_Controlle::class , 'store'   ]);
Route::get      ('/edit-drivers/{id}',  [Companion_Controlle::class , 'search'  ]);
Route::post     ('/update-drivers/{id}',[Companion_Controlle::class , 'update'  ]);
Route::delete   ('delete-drivers/{id}', [Companion_Controlle::class , 'destroy' ]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
