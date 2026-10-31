<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('projects.index');

Route::prefix('tfa5')->name('tfa5.')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/users', [UserController::class, 'index'])->name('users');
});
