<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto_insercao';
    
    protected $fillable = [
        'prod_id',             
        'prod_cod',            
        'prod_nome',           
        'prod_cat',            
        'prod_subcat',         
        'prod_desc',           
        'prod_fab',            
        'prod_mod',            
        'prod_cor',            
        'prod_peso',           
        'prod_alt',            
        'prod_prof',           
        'prod_unid',           
        'prod_ativo',          
        'prod_dt_cadastro',    
        'prod_dt_arualizacao' 
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'data_cadastro' => 'datetime',
        'data_atualizacao' => 'datetime'
    ];

    // Relacionamento com preços
    public function precos()
    {
        return $this->hasMany(Preco::class, 'preco_cod_prod', 'prod_cod');
    }

    // Acessar view de produtos transformados
    public static function transformados()
    {
        return DB::table('vw_produtos_transformados')->get();
    }

}
