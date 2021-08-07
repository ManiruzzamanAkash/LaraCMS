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

use Modules\Service\Http\Controllers\ServiceController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /**
     * Service CRUD
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('services', ServiceController::class);
        Route::get('services/trashed/view', [ServiceController::class, 'trashed'])->name('services.trashed');
        Route::delete('services/trashed/destroy/{id}', [ServiceController::class, 'destroyTrash'])->name('services.trashed.destroy');
        Route::put('services/trashed/revert/{id}', [ServiceController::class, 'revertFromTrash'])->name('services.trashed.revert');
    });
});
