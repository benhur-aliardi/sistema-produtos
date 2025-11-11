<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Processar e transformar produtos da tabela base
     */
    public function processar()
    {
        try {
            // Executar a função do PostgreSQL
            $resultado = DB::select('SELECT processar_produtos() as total');
            
            return response()->json([
                'success' => true,
                'message' => 'Produtos processados com sucesso',
                'total_processados' => $resultado[0]->total
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao processar produtos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Listar produtos transformados
     */
    public function listar()
    {
        try {
            $produtos = DB::table('vw_produtos_transformados')
                ->orderBy('prod_nome')
                ->paginate(15);
            
            return response()->json([
                'success' => true,
                'data' => $produtos
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao listar produtos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Buscar produto por código
     */
    public function buscar($codigo)
    {
        try {
            $produto = DB::table('vw_produtos_transformados')
                ->where('codigo_produto', $codigo)
                ->first();
            
            if (!$produto) {
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
