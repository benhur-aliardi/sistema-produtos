<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

use App\Exports\ProdutosExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [WebController::class, 'index']);
Route::get('/produtos', [WebController::class, 'produtos']);

Route::get('/produtos/export/excel', function () {
    return Excel::download(new ProdutosExport, 'produtos.xlsx');
})->name('produtos.export.excel');