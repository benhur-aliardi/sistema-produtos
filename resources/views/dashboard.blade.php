@extends('layouts.app')

@section('title', 'Dashboard - Sistema de Produtos')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Dashboard</h1>
        <p class="lead">Processamento de Dados de Produtos e Preços</p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Processar Produtos</h5>
                <p class="card-text">Executa a transformação dos dados de produtos</p>
                <button id="btn-processar-produtos" class="btn btn-primary">
                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                    Processar Produtos
                </button>
                <div id="resultado-produtos" class="mt-3"></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Processar Preços</h5>
                <p class="card-text">Executa a transformação dos dados de preços</p>
                <button id="btn-processar-precos" class="btn btn-success">
                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                    Processar Preços
                </button>
                <div id="resultado-precos" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ver Produtos Processados</h5>
                <a href="/produtos" class="btn btn-info">Ver Lista de Produtos</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // CSRF Token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Processar Produtos
    $('#btn-processar-produtos').click(function() {
        const btn = $(this);
        const spinner = btn.find('.spinner-border');
        const resultado = $('#resultado-produtos');
        
        btn.prop('disabled', true);
        spinner.removeClass('d-none');
        resultado.html('');
        
        $.ajax({
            url: '/api/v1/produtos/processar',
            method: 'POST',
            success: function(response) {
                resultado.html(`
                    <div class="alert alert-success">
                        ${response.message}<br>
                        Total processados: ${response.total_processados}
                    </div>
                `);
            },
            error: function(xhr) {
                resultado.html(`
                    <div class="alert alert-danger">
                        Erro ao processar produtos: ${xhr.responseJSON?.message || 'Erro desconhecido'}
                    </div>
                `);
            },
            complete: function() {
                btn.prop('disabled', false);
                spinner.addClass('d-none');
            }
        });
    });

    // Processar Preços
    $('#btn-processar-precos').click(function() {
        const btn = $(this);
        const spinner = btn.find('.spinner-border');
        const resultado = $('#resultado-precos');
        
        btn.prop('disabled', true);
        spinner.removeClass('d-none');
        resultado.html('');
        
        $.ajax({
            url: '/api/v1/precos/processar',
            method: 'POST',
            success: function(response) {
                resultado.html(`
                    <div class="alert alert-success">
                        ${response.message}<br>
                        Total processados: ${response.total_processados}
                    </div>
                `);
            },
            error: function(xhr) {
                resultado.html(`
                    <div class="alert alert-danger">
                        Erro ao processar preços: ${xhr.responseJSON?.message || 'Erro desconhecido'}
                    </div>
                `);
            },
            complete: function() {
                btn.prop('disabled', false);
                spinner.addClass('d-none');
            }
        });
    });
});
</script>
@endpush
