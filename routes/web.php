<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\{
    AdminController,
    AuthController,
    HomeController,
    PublicPageController
};

// =============================================================================
// PUBLIC ROUTES
// =============================================================================

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [HomeController::class, 'send'])->name('contact.send');

Route::get('/up', function () {
    Artisan::call('migrate');
    Artisan::call('optimize:clear');

    return redirect()->route('home')->with('status', 'Application is up to date!');
});

// Public Pages
Route::controller(PublicPageController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/features', 'features')->name('features');
    Route::get('/clients', 'clients')->name('clients');
    Route::get('/news', 'news')->name('news.index');
    Route::get('/news/{slug}', 'showNews')->name('news.show');
});



// =============================================================================
// AUTHENTICATION ROUTES
// =============================================================================

Route::controller(AuthController::class)->group(function () {
    // Redirect /login
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    // Logout Route
    Route::post('/admin/logout', 'logout')->name('admin.logout');
});



// =============================================================================
// ADMIN ROUTES (Protected)
// =============================================================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->controller(AdminController::class)
    ->group(function () {

        // Dashboard
        Route::get('/', 'index')->name('index');

        // Gallery Management
        Route::get('/galleries', 'galleries')->name('galleries'); // Direct route for backward compatibility
        Route::prefix('galleries')->name('galleries.')->group(function () {
            Route::post('/', 'storeGallery')->name('store');
            Route::delete('/{id}', 'deleteGallery')->name('delete');
        });

        // client Management
        Route::get('/clients', 'clients')->name('clients'); // Direct route for backward compatibility
        Route::prefix('clients')->name('clients.')->group(function () {
            Route::post('/', 'storeClient')->name('store');
            Route::put('/{id}', 'updateClient')->name('update');
            Route::delete('/{id}', 'deleteClient')->name('delete');
        });

        // News Management
        Route::get('/news', 'news')->name('news'); // Direct route for backward compatibility
        Route::prefix('news')->name('news.')->group(function () {
            Route::post('/', 'storeNews')->name('store');
            Route::put('/{id}', 'updateNews')->name('update');
            Route::delete('/{id}', 'deleteNews')->name('delete');
        });

        // Feature Management
        Route::get('/features', 'features')->name('features'); // Direct route for backward compatibility
        Route::prefix('features')->name('features.')->group(function () {
            Route::post('/', 'storeFeature')->name('store');
            Route::put('/{id}', 'updateFeature')->name('update');
            Route::delete('/{id}', 'deleteFeature')->name('delete');
        });

        // Utility Routes
        Route::get('/search', 'search')->name('search');

        // Legacy Routes (for backward compatibility)
        Route::post('/upload', 'storeGallery')->name('upload');
    });
