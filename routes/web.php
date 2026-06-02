<?php

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
