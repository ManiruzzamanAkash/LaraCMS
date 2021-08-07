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

use Modules\ThemeBusiness\Http\Controllers\FrontPagesController;

Route::group(['prefix' => 'demo/business', 'as' => 'demo.business'], function () { // @todo - Change prefix route name 'as' => 'demo.business.'
    Route::get( '/', [ FrontPagesController::class, 'index' ] )->name( 'index' );
    Route::get( '/service', [ FrontPagesController::class, 'service' ] )->name( 'service' );
    Route::get( '/about', [ FrontPagesController::class, 'about' ] )->name( 'about' );
    Route::get( '/blog', [ FrontPagesController::class, 'blog' ] )->name( 'blog' );
    Route::get( '/price', [ FrontPagesController::class, 'price' ] )->name( 'price' );
    Route::get( '/portfolio', [ FrontPagesController::class, 'portfolio' ] )->name( 'portfolio' );
    Route::get( '/contact', [ FrontPagesController::class, 'contact' ] )->name( 'contact' );
});
