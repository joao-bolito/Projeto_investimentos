<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rankings de Stocks - Maiores Valor de Mercado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .stock-logo {
            width: 50px;
            height: auto;
        }
        .table-header {
            background-color: #f8f9fa;
            text-align: center;
        }
        .no-data {
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Rankings de Stocks - Maiores Valor de Mercado</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-header">
                    <tr>
                        <th>Logo</th>
                        <th>Ticker</th>
                        <th>Valor de Mercado</th>
                        <th>P/L</th>
                        <th>P/VP</th>
                        <th>Margem Líquida</th>
                        <th>Setor</th>
                    </tr>
                </thead>
                <tbody>
                    @if (empty($stocks))
                        <tr>
                            <td colspan="7" class="text-center no-data">Nenhum dado disponível</td>
                        </tr>
                    @else
                        @foreach ($stocks as $stock)
                            <tr>
                                <td><img src="{{ asset('images/' . $stock['logo']) }}" alt="{{ $stock['ticker'] }}" class="stock-logo"></td>
                                <td>{{ $stock['ticker'] }}</td>
                                <td>{{ $stock['market_value'] }}</td>
                                <td>{{ $stock['pl'] }}</td>
                                <td>{{ $stock['pvp'] }}</td>
                                <td>{{ $stock['net_margin'] }}</td>
                                <td>{{ $stock['sector'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
