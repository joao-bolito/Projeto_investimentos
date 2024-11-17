@extends('layouts.app')

@section('title', 'Listar')

@section('style')
<style>
    .table-container {
        margin: 20px auto;
        width: 90%;
        max-width: 1200px;
        background: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #f1f3f5;
    }

    thead th {
        text-align: left;
        padding: 10px;
        font-size: 14px;
        color: #495057;
        font-weight: bold;
        border-bottom: 1px solid #ddd;
    }

    tbody tr {
        border-bottom: 1px solid #dee2e6;
        width: 150px;
    }

    tbody tr:hover {
        background: #424242;
        color: #fbfbfc !important;
        cursor: pointer;
    }

    tbody tr:hover td {
        color: #fbfbfc !important;
    }

    tbody td {
        width: 150px;
        padding: 10px;
        font-size: 14px;
        color: #343a40;
    }
</style>
@endsection

@section('content')

<section id="info" style="background: #424242; color: #fbfbfc">
    <div class="container">
        <div class="row align-items-center px-5 pt-3">
            <div class="col-md-12 p-3">
                <h2>Rankings - {{ $nome_ranking }}</h2>
            </div>
        </div>
    </div>
</section>

<div class="table-container">
    <table>
        <thead>
            <tr>

                <th>Nome</th>
                <th>Cotação Atual</th>
                <th>Valor de Mercado</th>
                <th>Setor</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lista_acoes as $lista)
                <tr onclick="window.location.href = '{{ route('acoes.index', ['acao' => $lista['stock']]) }}'">
                    <td> <img src="{{ $lista['logo'] }}" width="53"> {{ $lista['name'] }}</td>
                    <td>R$ {{ number_format($lista['close'], 2, ',', '.') }} </td>
                    <td> {{ number_format($lista['market_cap'], 0, ',', '.') }}</td>
                    <td> {{ $lista['sector'] }}</td>
                    <td> {{ $lista['type'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
