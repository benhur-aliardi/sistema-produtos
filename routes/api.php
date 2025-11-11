<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\PrecoController;
use App\Http\Controllers\Api\ProdutoPrecoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    
    // Rotas de Produtos
    Route::prefix('produtos')->group(function () {
        Route::post('/processar', [ProdutoController::class, 'processar']);
        Route::get('/', [ProdutoController::class, 'listar']);
        Route::get('/{codigo}', [ProdutoController::class, 'buscar']);
    });
    
    // Rotas de Preços
    Route::prefix('precos')->group(function () {
        Route::post('/processar', [PrecoController::class, 'processar']);
        Route::get('/', [PrecoController::class, 'listar']);
    });
    
    // Rotas de Produtos com Preços
    Route::prefix('produtos-precos')->group(function () {
        Route::get('/', [ProdutoPrecoController::class, 'listar']);
        Route::get('/{codigo}', [ProdutoPrecoController::class, 'buscar']);
    });
});