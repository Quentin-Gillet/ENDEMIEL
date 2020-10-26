<?php

use Illuminate\Support\Facades\Route;



Route::group(['namespace' => 'Endemiel\Core\Http\Controllers'], function (){

    Route::get('/', 'HomeController@index');

});
