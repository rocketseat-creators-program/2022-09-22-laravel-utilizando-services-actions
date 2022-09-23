<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users/{id}/toggle-active', [\App\Http\Controllers\UsersController::class, 'toggleActive'])->name('users.toggle-active');
    Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
});

require __DIR__.'/auth.php';
