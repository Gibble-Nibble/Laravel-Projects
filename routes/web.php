<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Tfa6CustomerController;
use App\Http\Controllers\Tfa6PageController;
use App\Http\Controllers\Tfa6UserController;
use App\Http\Controllers\Tfa7CustomerController;
use App\Http\Controllers\Tfa7PageController;
use App\Http\Controllers\Tfa7UserController;
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

Route::prefix('tfa7')->name('tfa7.')->group(function () {
    Route::get('/', [Tfa7PageController::class, 'index'])->name('home');
    Route::get('/about', [Tfa7PageController::class, 'about'])->name('about');

    Route::get('/customers', [Tfa7CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/create', [Tfa7CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [Tfa7CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{customer}/edit', [Tfa7CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [Tfa7CustomerController::class, 'update'])->name('customers.update');

    Route::get('/users', [Tfa7UserController::class, 'index'])->name('users');
    Route::get('/users/create', [Tfa7UserController::class, 'create'])->name('users.create');
    Route::post('/users', [Tfa7UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [Tfa7UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [Tfa7UserController::class, 'update'])->name('users.update');
});
