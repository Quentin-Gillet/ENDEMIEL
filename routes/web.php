<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlocSiteController;
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

//Marker routes
Route::get('/marker/all', [MapMarkerController::class, 'all'])->name('marker.all');
Route::get('/marker/info-window/{id}', [MapMarkerController::class, 'getInfoWindow'])->name('marker.info-window');

//Bloc site routes
Route::get('/bloc-site/{id}', [BlocSiteController::class, 'get'])->name('bloc-site.get');
Route::get('/bloc-site/create/{lat}/{lng}', [BlocSiteController::class, 'redirectToCreatePage'])->name('bloc-site.redirect-create');
Route::post('/bloc-site/create', [BlocSiteController::class, 'create'])->name('bloc-site.create');
Route::put('/bloc-site/update/{id}', [BlocSiteController::class, 'update'])->name('bloc-site.update');

//File upload
Route::post('/bloc-site/files-upload', [FileUploadController::class, 'filesUpload'])->name('bloc-site.files-upload');


//Account route
Route::get('/user/account', [UserController::class, 'index'])->name('user.account');

Route::get('/test', [BlocSiteController::class, 'test']);
Route::post('/test', [BlocSiteController::class, 'testPost'])->name('test.post');
