@extends('layouts.app')

@section('title', 'Lista Ações')

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

        tbody td {
            width: 150px;
            padding: 10px;
            font-size: 14px;
            color: #343a40;
        }

    </style>

@endsection

@section('content')
    
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

                <tr>

                    <td> <img src="{{$lista['logo']}}"> {{$lista['name']}}</td>
                    <td> {{$lista['close']}}</td>
                    <td> {{number_format($lista['market_cap'], 0, ',', '.')}}</td>
                    <td> {{$lista['sector']}}</td>
                    <td> {{$lista['type']}}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection