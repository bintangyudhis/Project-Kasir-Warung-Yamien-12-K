<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    
    return view('auth/login');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {

        if (auth()->user()->role === 'admin') {
            return redirect()->route('products.index');
        } elseif (auth()->user()->role === 'cashier') {
            return redirect()->route('orders.create');
        }

        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/my-profile', function () {
        return view('users.profile');
    })->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/tables/{table}/toggle-status', [BookingController::class, 'toggleStatus'])->name('bookings.toggleStatus');
    Route::get('/history-orders', [OrderController::class, 'history'])->name('orders.history');

    Route::middleware('admin')->group(function () {

        Route::resource('/categories', CategoryController::class);
        Route::resource('/products', ProductController::class);
        Route::resource('/tables', TableController::class);
        Route::resource('/users', UserController::class);
        Route::get('/activity-logs', [\App\Http\Controllers\ActivityLogController::class, 'index'])->name('activity-logs.index');
        Route::get('/activity-logs/export-pdf', [\App\Http\Controllers\ActivityLogController::class, 'exportPdf'])->name('activity-logs.export-pdf');
        Route::get('/activity-logs/export-excel', [\App\Http\Controllers\ActivityLogController::class, 'exportExcel'])->name('activity-logs.export-excel');
        Route::get('/orders-export-pdf', [OrderController::class, 'exportPdf'])->name('orders.export-pdf');
        Route::get('/orders-export-excel', [OrderController::class, 'exportExcel'])->name('orders.export-excel');
    });


    Route::middleware('cashier')->group(function () {

        Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::patch('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
        Route::get('/my-profile/{user}/edit', [UserController::class, 'edit'])->name('cashier.edit');
        Route::patch('/my-profile/{user}/update', [UserController::class, 'update'])->name('cashier.update');
        Route::get('/tables', [TableController::class, 'index'])->name('tables.index');
        Route::get('/tables/{table}', [TableController::class, 'show'])->name('tables.show');
        Route::resource('orders', OrderController::class);
        Route::get('/orders/receipt/{order}', [OrderController::class, 'receipt'])->name('orders.receipt');
    }); 

});

Route::post('/midtrans/callback', [OrderController::class, 'midtransCallback'])->name('midtrans.callback');

require __DIR__.'/auth.php';
