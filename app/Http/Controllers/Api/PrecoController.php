<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrecoController extends Controller
{
    /**
     * Processar e transformar preços da tabela base
     */
    public function processar()
    {
        try {
            $resultado = DB::select('SELECT processar_precos() as total');
            
            return response()->json([
                'success' => true,
                'message' => 'Preços processados com sucesso',
                'total_processados' => $resultado[0]->total
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao processar preços',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Listar preços transformados
     */
    public function listar()
    {
        try {
            $precos = DB::table('vw_precos_transformados')
                ->orderBy('prc_cod_prod')
                ->paginate(15);
            
            return response()->json([
                'success' => true,
                'data' => $precos
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao listar preços',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}