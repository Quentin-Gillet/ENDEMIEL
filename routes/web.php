<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapMarkerController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

//Marker route
Route::get('/marker/all', [MapMarkerController::class, 'all'])->name('marker.all');
Route::get('/marker/{id}', [MapMarkerController::class, 'get'])->name('marker.get');
Route::post('/marker/create', [MapMarkerController::class, 'create'])->name('marker.create');
Route::put('/marker/update/{id}', [MapMarkerController::class, 'update'])->name('marker.update');

//Account route
Route::get('/user/account', [UserController::class, 'index'])->name('user.account');
