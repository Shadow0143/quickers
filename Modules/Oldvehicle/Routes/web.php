<?php

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

Route::prefix('oldvehicle')->group(function () {
    Route::get('/', 'OldvehicleController@index')->name('vehicleIndex');
    Route::get('/create-vehicle', 'OldvehicleController@createVehicle')->name('createVehicle');
    Route::post('/store-vehicle', 'OldvehicleController@storeVehicle')->name('storeVehicle');
    Route::get('/edit-vehicle/{id}', 'OldvehicleController@editVehicle')->name('editVehicle');
    Route::get('/show-vehicle', 'OldvehicleController@showVehicle')->name('showVehicle');
    Route::get('/status-vehicle', 'OldvehicleController@statusVehicle')->name('statusVehicle');
    Route::get('/destroy-vehicle-image', 'OldvehicleController@destroyVehicleImage')->name('destroyVehicleImage');
});

Route::prefix('oldvehicle')->group(function () {
});
