<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\AcoesController;

Route::get('/', [dashboardController::class, 'index'])->name('home');
Route::get('/buscar', [dashboardController::class, 'search'])->name('search.stocks');

Route::get('/acoes/{acao}', [AcoesController::class, 'index'])->name('acoes.index');
Route::get('/acoes/{acao}/grafico', [AcoesController::class, 'grafico'])->name('acoes.grafico');

Route::get('/acoes/ranking', [AcoesController::class, 'grafico'])->name('acoes.ranking');

