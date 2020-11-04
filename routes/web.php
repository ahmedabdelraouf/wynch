<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/brands', [BrandController::class, 'index'])->name('brands');
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles');
Route::get('/drivers', [DriverController::class, 'index'])->name('drivers');
