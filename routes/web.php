<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('customers', CustomerController::class)->middleware('auth');

// Route untuk billing
Route::middleware('auth')->group(function () {
    Route::get('/billings', [BillingController::class, 'index'])->name('billing.index');
    Route::get('/billings/{id}', [BillingController::class, 'show'])->name('billing.show');
    Route::post('/billings/generate', [BillingController::class, 'generate'])->name('billing.generate');
});

Route::post('/billings/{id}/payment', [BillingController::class, 'storePayment'])->name('billing.storePayment');
Route::put('/billings/payment/{paymentId}/confirm', [BillingController::class, 'confirmPayment'])->name('billing.confirmPayment');

Route::resource('expenses', ExpenseController::class);
Route::resource('withdrawals', WithdrawalController::class);
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

Route::put('/billings/payment/{paymentId}/confirm', [BillingController::class, 'confirmPayment'])->name('billing.confirmPayment');

Route::resource('sideincomes', App\Http\Controllers\SideIncomeController::class)->middleware('auth');

require __DIR__ . '/auth.php';
