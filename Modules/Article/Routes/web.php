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

use Modules\Article\Http\Controllers\CategoriesController;
use Modules\Article\Http\Controllers\PagesController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    /**
     * Category Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('categories', CategoriesController::class);
        Route::get('categories/trashed/view', [CategoriesController::class, 'trashed'])->name('categories.trashed');
        Route::delete('categories/trashed/destroy/{id}', [CategoriesController::class, 'destroyTrash'])->name('categories.trashed.destroy');
        Route::put('categories/trashed/revert/{id}', [CategoriesController::class, 'revertFromTrash'])->name('categories.trashed.revert');
    });

    /**
     * Page Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('pages', PagesController::class);
        Route::get('pages/trashed/view', [PagesController::class, 'trashed'])->name('pages.trashed');
        Route::delete('pages/trashed/destroy/{id}', [PagesController::class, 'destroyTrash'])->name('pages.trashed.destroy');
        Route::put('pages/trashed/revert/{id}', [PagesController::class, 'revertFromTrash'])->name('pages.trashed.revert');
    });
});
