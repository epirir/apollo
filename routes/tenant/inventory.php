<?php

/**Stocks */
Route::name('brands.')->prefix('brands')->group(function () {
    Route::get('/', 'BrandController@index')
   ->name('index');
});
