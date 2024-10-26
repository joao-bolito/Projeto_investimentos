<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\dashboardController;

Route::get('/', [dashboardController::class, 'index'])->name('home');
