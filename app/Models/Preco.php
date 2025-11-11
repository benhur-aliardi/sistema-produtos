<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Preco extends Model
{
    use HasFactory;

    protected $table = 'preco_insercao';
    
    protected $fillable = [
        'preco_cod_prod',       
        'preco_venda',          
        'preco_desc',           
        'preco_acres',          
        'preco_moeda',          
        'preco_dt_in_promo',    
        'preco_dt_fim_promo',   
        'preco_dt_atual',       
        'preco_origem',         
        'preco_tipo_cli',       
        'preco_vend_resp',      
        'preco_obs',            
        'preco_ativo',          
        'preco_dt_atualizacao' 
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'preco_dt_atualizacao' => 'datetime'
    ];

    // Relacionamento com produto
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'prod_cod', 'preco_cod_prod');
    }

    // Acessar view de preços transformados
    public static function transformados()
    {
        return DB::table('vw_precos_transformados')->get();
    }    

}
