<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Route::get('/admin/bills/generate', [\App\Http\Controllers\GenerateBillController::class, '__invoke'])
    ->name('admin.bills.generate')
    ->middleware('moonshine');

Route::post('/admin/bills/{id}/payment', [\App\Http\Controllers\StorePaymentController::class, '__invoke'])
    ->name('admin.bills.storePayment')
    ->middleware('moonshine');

Route::get('/admin/payments/{id}/approve', [\App\Http\Controllers\ApprovePaymentController::class, '__invoke'])
    ->name('admin.payments.approve')
    ->middleware('moonshine');



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
