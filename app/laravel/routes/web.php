<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;

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
    
    Route::get('/', [DisplayController::class, 'index'])->name('home');
    
    Route::post('/create', [RegistrationController::class, 'create'])->name('create');
    Route::post('/staffs_create', [RegistrationController::class, 'staffs_create'])->name('staffs_create');
       
    Route::get('/mypaige', [DisplayController::class, 'mypaige'])->name('mypaige');
    Route::get('/staffs_mypaige', [DisplayController::class, 'staffs_mypaige'])->name('staffs_mypaige');

    Route::get('/update', [DisplayController::class, 'update'])->name('update');
    Route::post('/update', [RegistrationController::class, 'update'])->name('update');
    Route::get('/staffs_update', [DisplayController::class, 'staffs_update'])->name('staffs_update');
    Route::post('/staffs_update', [RegistrationController::class, 'staffs_update'])->name('staffs_update');

    Route::post('/search', [DisplayController::class, 'search'])->name('search');
    Route::post('/staffs_search', [DisplayController::class, 'staffs_search'])->name('staffs_search');
    
    Route::get('/detail', [DisplayController::class, 'detail'])->name('detail');
    Route::get('/staffs_detail', [DisplayController::class, 'staffs_detail'])->name('staffs_detail');

    Route::get('/apply', [DisplayController::class, 'apply'])->name('apply');
    
    Route::get('/recruit', [DisplayController::class, 'recruit'])->name('recruit');
    Route::post('/recruit', [RegistrationController::class, 'recruit'])->name('recruit');
    
    Route::get('/good', [DisplayController::class, 'good'])->name('good');
    
    Route::get('/applicant', [DisplayController::class, 'applicant'])->name('applicant');
    
    Route::get('/delete/{id}', [RegistrationController::class, 'delete'])->name('delete');
});