<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryActivityController;
use App\Http\Controllers\ProductLocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Guest Routes (Authentication)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register')->name('register.post');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Dashboard Routes
    |--------------------------------------------------------------------------
    */
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/dashboard/export-excel', 'exportExcel')->name('dashboard.export.excel');
        Route::get('/dashboard/export-pdf', 'exportPDF')->name('dashboard.export.pdf');
    });

    /*
    |--------------------------------------------------------------------------
    | Categories Management
    |--------------------------------------------------------------------------
    */
    Route::resource('categories', CategoryController::class)->except(['show']);

    /*
    |--------------------------------------------------------------------------
    | Products Management
    |--------------------------------------------------------------------------
    */
    Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
        // Standard CRUD
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');

        // Stock Management
        Route::get('/{id}/adjust-stock', 'adjustStockForm')->name('adjustStockForm');
        Route::post('/{id}/adjust-stock', 'adjustStock')->name('adjustStock');
        Route::post('/{id}/add-stock', 'addStock')->name('addStock');
        Route::post('/{id}/reduce-stock', 'reduceStock')->name('reduceStock');
    });

    /*
    |--------------------------------------------------------------------------
    | Suppliers Management
    |--------------------------------------------------------------------------
    */
    Route::resource('suppliers', SupplierController::class)->except(['show']);

    /*
    |--------------------------------------------------------------------------
    | Product Locations Management
    |--------------------------------------------------------------------------
    */
    Route::resource('locations', ProductLocationController::class)->except(['show']);

    /*
    |--------------------------------------------------------------------------
    | Orders Management
    |--------------------------------------------------------------------------
    */
    Route::prefix('orders')->name('orders.')->controller(OrderController::class)->group(function () {
        // Standard CRUD
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{order}', 'show')->name('show');
        Route::get('/{order}/edit', 'edit')->name('edit');
        Route::put('/{order}', 'update')->name('update');
        Route::delete('/{order}', 'destroy')->name('destroy');

        // Special Actions
        Route::post('/{order}/cancel', 'cancel')->name('cancel');
        Route::get('/{order}/print', 'print')->name('print');

        // AJAX Routes
        Route::get('/search/products', 'searchProducts')->name('search-products');
    });

    /*
    |--------------------------------------------------------------------------
    | Profile Management
    |--------------------------------------------------------------------------
    */
    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
    });

    /*
    |--------------------------------------------------------------------------
    | Account Management (User)
    |--------------------------------------------------------------------------
    */
    Route::prefix('account')->controller(AccountController::class)->group(function () {
        Route::get('/', 'index')->name('account.index');
        Route::post('/update', 'updateAccount')->name('account.update');
        Route::post('/change-password', 'changePassword')->name('account.changePassword');
    });

    /*
    |--------------------------------------------------------------------------
    | History Activity
    |--------------------------------------------------------------------------
    */
    Route::prefix('history')->name('history.')->controller(HistoryActivityController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/filter', 'filter')->name('filter');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::delete('/', 'destroyAll')->name('destroyAll');
    });

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    */
    Route::prefix('notifications')->name('notifications.')->controller(NotificationController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/mark-as-read/{id}', 'markAsRead')->name('markAsRead');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Routes (Accounts Management)
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/accounts')->name('accounts.')->controller(AccountController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});
