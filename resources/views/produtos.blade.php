@extends('layouts.app')

@section('title', 'Produtos - Sistema de Produtos')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Produtos com Preços</h1>
        <a href="/" class="btn btn-secondary mb-3">Voltar ao Dashboard</a>
    </div>
</div>


<pre style="font-family: Consolas, Courier New, monospace; font-size: 13px; background: #f8f9fa; padding: 12px; border-radius: 5px; overflow-x: auto;">
@foreach($produtos as $produto)
{{ 
    mb_str_pad($produto->prod_cod, 10) .
    mb_str_pad($produto->prod_nome, 30) .
    mb_str_pad($produto->prod_cat, 15) .
    mb_str_pad($produto->prod_subcat, 15) .
    mb_str_pad($produto->prod_desc, 50) .
    mb_str_pad($produto->prod_fab, 15) .
    mb_str_pad($produto->prod_mod, 15) .
    mb_str_pad($produto->prod_cor, 15) .
    mb_str_pad($produto->prod_unid, 10) .
    mb_str_pad($produto->prod_ativo, 10) .
    mb_str_pad($produto->prod_ativo, 10) .
    mb_str_pad($produto->prod_dt_cadastro, 15) .
    mb_str_pad($produto->prod_peso, 15) .
    mb_str_pad($produto->prod_larg, 15) .
    mb_str_pad($produto->prod_alt, 15) .
    mb_str_pad($produto->prod_prof, 15) .
    mb_str_pad($produto->preco_cod_prod, 10) .
    mb_str_pad($produto->preco_moeda, 10) .
    mb_str_pad($produto->preco_origem, 15) .
    mb_str_pad($produto->preco_tipo_cli, 20) .
    mb_str_pad($produto->preco_vend_resp, 20) .
    mb_str_pad($produto->preco_obs, 30) .
    mb_str_pad($produto->preco_venda, 15) .
    mb_str_pad($produto->preco_promo, 15) .
    mb_str_pad($produto->preco_desc, 15) .
    mb_str_pad($produto->preco_acres, 15) .
    mb_str_pad($produto->preco_dt_ini_promo, 15) .
    mb_str_pad($produto->preco_dt_fim_promo, 15) .
    mb_str_pad($produto->preco_dt_atualizacao, 15)
}}
@endforeach
</pre>

<td>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Sub Categoria</th>
                        <th>Descrição</th>
                        <th>Fabricação</th>
                        <th>Modelo</th>
                        <th>Cor</th>
                        <th>Unidade</th>
                        <th>Ativo</th>
                        <th>Data Cadastro</th>
                        <th>Peso</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th>Profunddidade </th>
                        <th>Preco Código</th>
                        <th>Preco Moeda</th>
                        <th>Preco Origem</th>
                        <th>Preco Tipo Cliente</th>
                        <th>Preco Vendedor</th>
                        <th>Preco Obs</th>
                        <th>Preco Valor</th>
                        <th>Preco Promoção</th>
                        <th>Preco Desconto %</th>
                        <th>Preco Acrescimo %</th>
                        <th>Preco Dt Inial Promo</th>
                        <th>Preco Dt Final Promo</th>
                        <th>Preco Dt Atualização</th>
                        <th>Preco Ativo</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produtos as $produto)
                    <tr>
                        <td>{{ mb_str_pad($produto->prod_cod, 10) }}</td>
                        <td>{{ mb_str_pad($produto->prod_nome, 30) }}</td>
                        <td>{{ mb_str_pad($produto->prod_cat, 15) }}</td>
                        <td>{{ mb_str_pad($produto->prod_subcat, 15) }}</td>
                        <td>{{ mb_str_pad($produto->prod_desc, 50) }}</td>
                        <td>{{ mb_str_pad($produto->prod_fab, 15) }}</td>
                        <td>{{ mb_str_pad($produto->prod_mod, 15) }}</td>
                        <td>{{ mb_str_pad($produto->prod_cor, 15) }}</td>
                        <td>{{ mb_str_pad($produto->prod_unid, 10) }}</td>
                        <td>{{ mb_str_pad($produto->prod_ativo, 10) }}</td>
                        <td>{{ \Carbon\Carbon::parse($produto->prod_dt_cadastro)->format('d/m/Y H:i') }}</td>
                        <td>{{ number_format($produto->prod_peso ?? 0, 2, ',', '.') }}</td>
                        <td>{{ number_format($produto->prod_larg ?? 0, 2, ',', '.') }}</td>
                        <td>{{ number_format($produto->prod_alt ?? 0, 2, ',', '.') }}</td>
                        <td>{{ number_format($produto->prod_prof ?? 0, 2, ',', '.') }}</td>
                        <td>{{ mb_str_pad($produto->preco_cod_prod, 10) }}</td>
                        <td>{{ mb_str_pad($produto->preco_moeda, 10) }}</td>
                        <td>{{ mb_str_pad($produto->preco_origem, 15) }}</td>
                        <td>{{ mb_str_pad($produto->preco_tipo_cli, 20) }}</td>
                        <td>{{ mb_str_pad($produto->preco_vend_resp, 20) }}</td>
                        <td>{{ mb_str_pad($produto->preco_obs, 30) }}</td>
                        <td>{{ number_format($produto->preco_venda ?? 0, 2, ',', '.') }}</td>
                        <td>{{ number_format($produto->preco_promo ?? 0, 2, ',', '.') }}</td>
                        <td>{{ number_format($produto->preco_desc ?? 0, 2, ',', '.') }}</td>
                        <td>{{ number_format($produto->preco_acres ?? 0, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($produto->preco_dt_ini_promo)->format('d/m/Y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($produto->preco_dt_fim_promo)->format('d/m/Y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($produto->preco_dt_atualizacao)->format('d/m/Y H:i') }}</td>
                        <td>
                        @if($produto->prod_ativo)
                            <span class="badge bg-success">Ativo</span>
                        @else
                            <span class="badge bg-danger">Inativo</span>
                        @endif
                        <td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Nenhum produto encontrado</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Paginação -->
        <div class="d-flex justify-content-center">
            {{ $produtos->links() }}
        </div>
    </div>
    <div class="mb-3">
        <a href="{{ route('produtos.export.excel') }}" class="btn btn-success">📥 Exportar Excel</a>
    </div>    
</div>

@endsection