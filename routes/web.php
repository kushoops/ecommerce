<?php

use App\Livewire\Pages\Admin\Customers;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Admin\OrderSummary as AdminOrderSummary;
use App\Livewire\Pages\Admin\Products;
use App\Livewire\Pages\Admin\Transaction;
use App\Livewire\Pages\Customer\Checkout;
use App\Livewire\Pages\Customer\Dashboard as CustomerDashboard;
use App\Livewire\Pages\Customer\Orders;
use App\Livewire\Pages\Customer\OrderSummary;
use App\Livewire\Pages\Customer\OrderSummaryPdf;
use App\Livewire\Pages\Customer\Products as CustomerProducts;
use App\Livewire\Pages\Customer\Transaction as CustomerTransaction;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Admin
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('/products', Products::class)->name('admin.products');
        Route::get('/customers', Customers::class)->name('admin.customers');
        Route::get('/transaction', Transaction::class)->name('admin.transaction');
        Route::get('/order-summary/{id}', AdminOrderSummary::class)->name('admin.order-summary.id');
    });
});

// Customer
Route::middleware(['auth', 'verified', 'role:customer'])->group(function () {
    Route::get('/dashboard', CustomerDashboard::class)->name('dashboard');
    Route::get('/products', CustomerProducts::class)->name('products');
    Route::get('/orders', Orders::class)->name('orders');
    Route::get('/order-summary/{id}', OrderSummary::class)->name('order-summary.id');
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/transaction', CustomerTransaction::class)->name('transaction');
});

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

require __DIR__.'/auth.php';
