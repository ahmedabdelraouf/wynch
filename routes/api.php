<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CarController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DriverController;
use App\Http\Controllers\API\UserVehicleController;
use App\Http\Controllers\API\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/profile/{user}', [AuthController::class, 'profile']);
Route::post('/profile/{user}', [AuthController::class, 'updateProfile']);
Route::post('/forgetPassword', [AuthController::class, 'forgetPassword']);
Route::post('/verifyPhone', [AuthController::class, 'verifyPhone']);

Route::apiResource('category', CategoryController::class)->middleware('auth:api');
Route::apiResource('brand', BrandController::class)->middleware('auth:api');
Route::get('categoryBrands/{category}', [CategoryController::class,'categoryBrands'])->middleware('auth:api');
Route::get('brandVehicles/{brand}', [BrandController::class,'brandVehicles'])->middleware('auth:api');
Route::apiResource('vehicles', VehicleController::class)->middleware('auth:api');
Route::apiResource('brand', BrandController::class)->middleware('auth:api');
Route::apiResource('userVehicles', UserVehicleController::class)->middleware('auth:api');
Route::apiResource('car', CarController::class)->middleware('auth:api');
Route::apiResource('drivers', DriverController::class)->middleware('auth:api');
Route::post('driver/changeStatus/{driver}', [DriverController::class, 'changeStatus'])->middleware('auth:api');
