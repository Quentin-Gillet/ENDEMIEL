<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlocSpotController;
use App\Http\Controllers\MapMarkerController;
use App\Http\Controllers\TestController;
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

//Marker routes
Route::get('/marker/all', [MapMarkerController::class, 'all'])->name('marker.all');
Route::get('/marker/info-window/{id}', [MapMarkerController::class, 'getInfoWindow'])->name('marker.info-window');

//Bloc site routes
Route::get('/bloc-spot', [BlocSpotController::class, 'index'])->name('bloc-spot.index');
Route::get('/bloc-spot/create', [BlocSpotController::class, 'create'])->name('bloc-spot.create');
Route::get('/bloc-spot/view/{id}', [BlocSpotController::class, 'get'])->name('bloc-spot.get');

Route::post('/bloc-spot/store', [BlocSpotController::class, 'store'])->name('bloc-spot.store');
Route::put('/bloc-spot/update/{id}', [BlocSpotController::class, 'update'])->name('bloc-spot.update');

//File upload
Route::post('/bloc-spot/upload', [FileUploadController::class, 'filesUpload'])->name('bloc-spot.upload');

//Account route
Route::get('/user/account', [UserController::class, 'index'])->name('user.account');

//Test routes
Route::get('/test', [TestController::class, 'test']);

