<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\listarAcoesController;
use App\Http\Controllers\AcoesController;
use App\Http\Controllers\CarteiraController;

Route::get('/', [dashboardController::class, 'index'])->name('home');

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'cadastrar'])->name('login');
Route::get('/entrar', [loginController::class, 'entrar'])->name('entrar');
Route::post('/entrar', [loginController::class, 'validaEntrar'])->name('validaEntrar');


Route::get('/listar/acoes/ranking/{tipo_acao}', [listarAcoesController::class, 'listar']);


Route::get('/', [dashboardController::class, 'index'])->name('home');
Route::get('/buscar', [dashboardController::class, 'search'])->name('search.stocks');

Route::get('/acoes/acao/{acao}', [AcoesController::class, 'index'])->name('acoes.index');
Route::get('/acoes/acao/{acao}/grafico', [AcoesController::class, 'grafico'])->name('acoes.grafico');

Route::get('/acoes/ranking', [AcoesController::class, 'ranking'])->name('acoes.ranking');

Route::get('/carteira', [CarteiraController::class, 'index'])->name('carteira.index');
Route::post('/carteira', [CarteiraController::class, 'adicionar_ativo'])->name('carteira.adicionar_ativo');
