<?php

use App\Http\Controllers\DisplayController;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/', [DisplayController::class, 'index']);
    
    Route::get('/mypaige', [DisplayController::class, 'mypaige'])->name('mypaige');
    Route::get('/mypaige', [DisplayController::class, 'staffs_mypaige'])->name('staffs_mypaige');

    Route::get('/update', [DisplayController::class, 'update'])->name('update');

    Route::post('/search', [DisplayController::class, 'search'])->name('search');
    
    Route::get('/detail', [DisplayController::class, 'detail'])->name('detail');

    Route::get('/apply', [DisplayController::class, 'apply'])->name('apply');


});