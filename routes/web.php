<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users/{id}/toggle-active', [UsersController::class, 'toggleActive'])->name('users.toggle-active');
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
});

require __DIR__.'/auth.php';
