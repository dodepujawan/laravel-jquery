<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::get('/home', [LoginController::class, 'index'])->name('index')->middleware('auth');
    Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin')->middleware('web');
    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
});

Route::prefix('register')->middleware('auth')->group(function () {
    Route::get('/', [RegisterController::class, 'register'])->name('register');
    Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');
    Route::get('editregister', [RegisterController::class, 'editregister'])->name('editregister');
    Route::post('updateregister', [RegisterController::class, 'updateregister'])->name('updateregister');
    Route::get('listregister', [RegisterController::class, 'listregister'])->name('listregister');
    Route::get('filter_register', [RegisterController::class, 'filter_register'])->name('filter_register');
    Route::get('edit_list_register/{id}', [RegisterController::class, 'edit_list_register'])->name('edit_list_register');
    Route::get('select_list_register_staff/{id}', [RegisterController::class, 'select_list_register_staff'])->name('select_list_register_staff');
    Route::post('update_list_register', [RegisterController::class, 'update_list_register'])->name('update_list_register');
    Route::delete('delete_list_register/{id}', [RegisterController::class, 'delete_list_register'])->name('delete_list_register');
    Route::get('/generate-user-id', [RegisterController::class, 'generate_user_id'])->name('generate_user_id');
});


// Route::prefix('register')->group(function () {
//     Route::get('/users', UsersPage::class)->name('users.page');
// });

