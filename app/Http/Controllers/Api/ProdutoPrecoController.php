<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoPrecoController extends Controller
{
    /**
     * Listar produtos com seus preços
     */
    public function listar()
    {
        try {
            $produtosComPrecos = DB::table('vw_produtos_com_precos')
                ->orderBy('prod_cod')
                ->paginate(15);
            
            return response()->json([
                'success' => true,
                'data' => $produtosComPrecos
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao listar produtos com preços',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     *
     * Buscar produto com preços por código
     */
    public function buscar($codigo)
    {
        try {
            $produto = DB::table('vw_produtos_com_precos')
                ->where('codigo_produto', $codigo)
                ->get();
            
            if ($produto->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produto não encontrado'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'data' => $produto
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao buscar produto',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}