<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Booking\Http\Controllers\BillingInformationController;
use Modules\Booking\Http\Controllers\BookingRequestController;

Route::prefix('booking-request')->group(function () {
    Route::post('store', [BookingRequestController::class, 'store'])->name('booking.request.store');
    Route::post('{booking_request_id}/billing-information', [BillingInformationController::class, 'store'])->name('booking.request.store.billing');
});

Route::prefix('admin/booking-request')->group(function () {
    Route::get('', [BookingRequestController::class, 'index'])->name('admin.booking_request.index');
    Route::get('{id}', [BookingRequestController::class, 'edit'])->name('admin.booking_request.edit');
    Route::put('{id}', [BookingRequestController::class, 'update'])->name('admin.booking_request.update');
    Route::delete('{id}', [BookingRequestController::class, 'destroy'])->name('admin.booking_request.delete');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['prefix' => 'booking-request', 'as' => 'booking_request.'], function () {
        Route::get('', [BookingRequestController::class, 'index'])->name('index');
        Route::get('{id}', [BookingRequestController::class, 'edit'])->name('edit');
        Route::put('{id}', [BookingRequestController::class, 'update'])->name('update');
        Route::delete('{id}', [BookingRequestController::class, 'destroy'])->name('delete');

        Route::get('trashed/view', [BookingRequestController::class, 'trashed'])->name('trashed');
        Route::delete('trashed/destroy/{id}', [BookingRequestController::class, 'destroyTrash'])->name('trashed.destroy');
        Route::put('trashed/revert/{id}', [BookingRequestController::class, 'revertFromTrash'])->name('trashed.revert');
    });
});
