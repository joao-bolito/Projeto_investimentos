<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\listarAcoesController;

Route::get('/', [dashboardController::class, 'index'])->name('home');

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'cadastrar'])->name('login');
Route::get('/entrar', [loginController::class, 'entrar'])->name('entrar');
Route::post('/entrar', [loginController::class, 'validaEntrar'])->name('validaEntrar');


Route::get('/listar', [listarAcoesController::class, 'listar']);
