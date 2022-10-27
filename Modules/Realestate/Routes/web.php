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

Route::prefix('realestate')->group(function () {
    Route::get('/', 'RealestateController@realestateIndex')->name('realestateIndex');
    Route::get('/create-property', 'RealestateController@createProperty')->name('createProperty');
    Route::post('/submit-property', 'RealestateController@submitProperty')->name('submitProperty');
    Route::get('/delete-property-image', 'RealestateController@deleteImage')->name('deleteImage');
    Route::get('/edit-property/{id}', 'RealestateController@editProperty')->name('editProperty');
    Route::get('/update-status', 'RealestateController@updateStatus')->name('updateStatus');
    Route::get('/view-more', 'RealestateController@viewMore')->name('viewMore');
    Route::get('/search-by-keywords', 'RealestateController@searchKeyWords')->name('searchKeyWords');
    Route::get('/search-by-prce-order', 'RealestateController@searchByPriceOrder')->name('searchByPriceOrder');
});
