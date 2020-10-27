<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CarController;
use App\Http\Controllers\API\CategoryController;
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
Route::apiResource('car', CarController::class)->middleware('auth:api');
