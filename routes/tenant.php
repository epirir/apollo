<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::middleware(['universal'])->group(function () {
        Auth::routes();
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/', 'DashboardController@dashboard')
        ->name('index');

        Route::get('dashboard', 'DashboardController@dashboard')
        ->name('dashboard');

        /**Sales */
        Route::namespace('Sales')->name('sales.')->prefix('sales')->group(base_path('routes/tenant/sales.php'));

        /**Inventory */
        Route::namespace('Inventory')->name('inventory.')->prefix('inventory')->group(base_path('routes/tenant/inventory.php'));

        Route::get('lang/{locale}', [LanguageController::class, 'swap']);
    });
});
