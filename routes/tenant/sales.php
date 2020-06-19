<?php

/**Menu */
Route::name('menu.')->prefix('menu')->group(function () {
    Route::get('/', 'MenuController@index')
   ->name('index');
});
