<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\DashboardController;
use App\Http\Controllers\Tenant\ProductController;
use App\Http\Controllers\Tenant\ProfileController;
use App\Http\Controllers\Tenant\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;





Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', [ProductController::class,'homepage'])->name('tenant.index');

    // admin routes

    Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

        // Product routes
        Route::prefix('/dashboard/products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])
                ->name('tenant.products.index'); // 獲取所有產品
            Route::post('/products', [ProductController::class, 'store'])
                ->name('tenant.products.store'); // 創建產品
            Route::delete('/products/{product}', [ProductController::class, 'destroy'])
                ->name('tenant.products.destroy'); // 刪除產品
            Route::get('/central', [ProductController::class, 'listAvailableCentralProducts'])
                ->name('tenant.products.central'); // 獲取可導入的中央產品
            Route::post('/central/{id}/import', [ProductController::class, 'importCentralProduct'])
                ->name('tenant.products.import'); // 導入中央產品
        });

         // User routes

            Route::resource('users', UserController::class);
    });


    Route::middleware('auth')->group(function () {
        // Dashboard route
        Route::get('/dashboard', function () {
            return Inertia::render('Tenant/Dashboard', [
                'user' => auth()->user(),
            ]);
        })->name('tenant.dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    });


    require __DIR__ . '/tenant-auth.php';
});
