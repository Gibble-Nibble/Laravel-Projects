<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Tfa6CustomerController;
use App\Http\Controllers\Tfa6PageController;
use App\Http\Controllers\Tfa6UserController;
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

Route::prefix('tfa6')->name('tfa6.')->group(function () {
    Route::get('/', [Tfa6PageController::class, 'index'])->name('home');
    Route::get('/about', [Tfa6PageController::class, 'about'])->name('about');
    Route::get('/customers', [Tfa6CustomerController::class, 'index'])->name('customers');
    Route::get('/users', [Tfa6UserController::class, 'index'])->name('users');
});
