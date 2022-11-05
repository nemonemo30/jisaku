<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

// password_reset

//  ログイン
Route::group(['middleware' => 'auth'], function() {

    // プレイヤー
    Route::get('/', [DisplayController::class, 'index'])->name('home');

    Route::post('/create', [RegistrationController::class, 'create'])->name('create');

    Route::get('/mypaige', [DisplayController::class, 'mypaige'])->name('mypaige');

    Route::get('/update', [DisplayController::class, 'update'])->name('update');
    Route::post('/update', [RegistrationController::class, 'update'])->name('update');
    
    Route::post('/search', [DisplayController::class, 'search'])->name('search');
    
    Route::get('/detail/{id}', [DisplayController::class, 'detail'])->name('detail');
    Route::get('/good_detail/{id}', [DisplayController::class, 'good_detail'])->name('good_detail');

    Route::get('/apply/{id}', [DisplayController::class, 'apply'])->name('apply');
    Route::post('/apply/{id}', [RegistrationController::class, 'apply'])->name('apply');

    Route::get('/recruit', [DisplayController::class, 'recruit'])->name('recruit');
    Route::post('/recruit', [RegistrationController::class, 'recruit'])->name('recruit');

    Route::get('/delete/{id}', [RegistrationController::class, 'delete'])->name('delete');
    
    Route::get('/players_recruit/{id}', [DisplayController::class, 'players_recruit'])->name('players_recruit');
    
    Route::post('/chat', [RegistrationController::class, 'chat'])->name('chat');
    Route::get('/chat/{id}', [DisplayController::class, 'chat'])->name('chat');
    
    Route::get('/chat_list', [DisplayController::class, 'chat_list'])->name('chat_list');
    
    // スタッフ
    Route::post('/staffs_create', [RegistrationController::class, 'staffs_create'])->name('staffs_create');
    
    Route::get('/staffs_mypaige', [DisplayController::class, 'staffs_mypaige'])->name('staffs_mypaige');
    
    Route::get('/staffs_update', [DisplayController::class, 'staffs_update'])->name('staffs_update');
    Route::post('/staffs_update', [RegistrationController::class, 'staffs_update'])->name('staffs_update');

    Route::post('/staffs_search', [DisplayController::class, 'staffs_search'])->name('staffs_search');
    
    Route::get('/staffs_detail/{id}', [DisplayController::class, 'staffs_detail'])->name('staffs_detail');
    
    Route::get('/good', [DisplayController::class, 'good'])->name('good');
    Route::get('/player_good', [DisplayController::class, 'player_good'])->name('player_good');
    
    Route::get('/applicant', [DisplayController::class, 'applicant'])->name('applicant');
    
    Route::get('/staffs_delete/{id}', [RegistrationController::class, 'staffs_delete'])->name('staffs_delete');
    
    Route::post('/like', [RegistrationController::class, 'like'])->name('like');
    Route::post('/unlike', [RegistrationController::class, 'unlike'])->name('unlike');
    
    Route::post('staffs_chat', [RegistrationController::class, 'staffs_chat'])->name('staffs_chat');
    Route::get('/staffs_chat/{id}', [DisplayController::class, 'staffs_chat'])->name('staffs_chat');
    
    Route::get('/staffs_chat_list', [DisplayController::class, 'staffs_chat_list'])->name('staffs_chat_list');

    // 管理者
    Route::get('/manager_mypaige', [DisplayController::class, 'manager_mypaige'])->name('manager_mypaige');
    Route::get('/manager_staff_mypaige', [DisplayController::class, 'manager_staff_mypaige'])->name('manager_staff_mypaige');

    Route::get('/manager_update/{id}', [DisplayController::class, 'manager_update'])->name('manager_update');
    Route::post('/manager_update/{id}', [RegistrationController::class, 'manager_update'])->name('manager_update');
    Route::get('/manager_staffs_update/{id}', [DisplayController::class, 'manager_staffs_update'])->name('manager_staffs_update');
    Route::post('/manager_staffs_update/{id}', [RegistrationController::class, 'manager_staffs_update'])->name('manager_staffs_update');

    Route::get('/manager_recruit', [DisplayController::class, 'manager_recruit'])->name('manager_recruit');
    
    Route::get('/manager_staffs_delete/{id}', [RegistrationController::class, 'manager_staffs_delete'])->name('manager_staffs_delete');
    Route::get('/manager_delete/{id}', [RegistrationController::class, 'manager_delete'])->name('manager_delete');

});