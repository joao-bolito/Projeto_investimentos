@extends('layouts.app')

@section('title', 'Página Inicial')

@section('style')
<style>
    .logo {
        align-items: center;
        background: #fff;
        border-radius: 10px;
        display: flex;
        height: 100px;
        justify-content: center;
        margin-bottom: -20px;
        margin-top: 15px;
        max-width: 100px;
        min-width: 100px;

    }

    #cotacao .card {
        box-shadow: 0 0 10px rgba(0, 0, 0, .161);
    }

    #info a {
        color: #fbfbfc;
        text-decoration: none;
    }

    #info a:hover {
        color: #dbdbdb;
        text-decoration: none;
    }

    #info a:hover i {
        color: #1b7c7e !important;
        text-decoration: none;
    }

    .buttons button {
        background: transparent;
        border: none;
        color: inherit;
        font: inherit;
        cursor: pointer;
        font-weight: bold;
    }

    .buttons button:hover {
        color: #229799;
        text-decoration: underline;
    }

    .buttons button.selected {
        color: #229799;
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
    <section id="info" style="background: #424242; color: #fbfbfc">
        <div class="container">
            <div class="row align-items-center px-5 pt-3">
                <div class="col-md-5 d-flex align-items-center">
                    <div class="logo">
                        <img src="{{ $response['logourl'] }}" width="80">
                    </div>
                    <div class="ps-3">
                        <span class="fw-bold fs-5">{{ $response['symbol'] }}</span>
                        <br>
                        <small class="fw-bold">{{ $response['longName'] }}</small>
                    </div>
                </div>
                <div class="col-md-7 py-3">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <a href="#cotacao">
                                <i class="fa-solid fa-diagram-project fs-2 pb-1" style="color: #229799"></i>
                                <br>
                                <small class="fw-bold">COTAÇÃO</small>
                            </a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="#incadores">
                                <i class="fa-solid fa-chart-simple fs-2 pb-1" style="color: #229799"></i>
                                <br>
                                <small class="fw-bold">INDICADORES</small>
                            </a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="#empresa">
                                <i class="fa-solid fa-shop fs-2 pb-1" style="color: #229799"></i>
                                <br>
                                <small class="fw-bold">EMPRESA</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cotacao" style="background: #eaeaea;">
        <div class="container p-5 pt-5">
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="card mb-3" style="width: 250px;height: 100px;">
                        <div class="card-header text-center fw-bold" style="background: #424242;color: #fbfbfc">Cotação</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">R$ {{ number_format($response['regularMarketPrice'], 2, '.', ',') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="card mb-3" style="width: 250px;height: 100px;">
                        <div class="card-header text-center fw-bold" style="background: #424242;color: #fbfbfc">Variação</div>
                        <div class="card-body">
                            @if ($response['regularMarketChange'] < 0)
                                <h5 class="card-title text-center fw-bold">
                                    <span  class="pe-1">{{ number_format($response['regularMarketChange'], 2) * -1 }}%</span>
                                    <i class="fa-solid fa-caret-down" style="color: #f44b4b;"></i>
                                </h5>
                            @else
                                <h5 class="card-title text-center fw-bold">
                                    <span class="pe-1">{{ number_format($response['regularMarketChange'], 2) }}%</span>
                                    <i class="fa-solid fa-caret-up" style="color: #4bf49a;"></i>
                                </h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="card mb-3" style="width: 250px;height: 100px;">
                        <div class="card-header text-center fw-bold" style="background: #424242;color: #fbfbfc">P/L</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">{{ number_format($response['priceEarnings'], 2, '.', ',') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="card mb-3" style="width: 250px;height: 100px;">
                        <div class="card-header text-center fw-bold" style="background: #424242;color: #fbfbfc">Setor</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">{{ $response['summaryProfile']['sector'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="incadores" style="background: #eaeaea;">
        <div class="container py-3 px-5">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #424242;color: #fbfbfc">
                    <h4 class="m-0 fw-bold"><i class="fa-solid fa-diagram-project"></i> Cotação</h4>
                    <div class="buttons">
                        <button id="btn-5d">5 DIAS</button>
                        <button id="btn-1mo">1 MÊS</button>
                        <button id="btn-3mo">3 MESES</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="stock-chart" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="incadores" style="background: #eaeaea;">
        <div class="container py-3 px-5">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #424242;color: #fbfbfc">
                    <h4 class="m-0 fw-bold"><i class="fa-solid fa-shop"></i> Sobre a empresa</h4>
                </div>
                <div class="card-body">
                    <p>{{ $response['summaryProfile']['longBusinessSummary'] }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        var chart = echarts.init(document.getElementById('stock-chart'));

        function updateChart(period) {
            $.ajax({
                url: "{{ route('acoes.grafico', ['acao' => $nome]) }}",
                type: 'GET',
                data: {
                    period: period
                },
                success: function(data) {
                    var dates = [];
                    var values = [];

                    data.results[0].historicalDataPrice.forEach(point => {
                        dates.push(new Date(point.date * 1000).toLocaleDateString('pt-BR'));
                        values.push(point.close);
                    });

                    var option = {
                        tooltip: {
                            trigger: 'axis',
                            formatter: function (params) {
                                var value = params[0].value;
                                var formattedValue = value.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                                return params[0].name + '<br/> R$ ' + formattedValue;
                            }
                        },
                        xAxis: {
                            type: 'category',
                            data: dates,
                            boundaryGap: false
                        },
                        yAxis: {
                            type: 'value',
                            axisLabel: {
                                formatter: function (value) {
                                    return 'R$ ' + value.toFixed(2).replace('.', ',');
                                }
                            }
                        },
                        series: [{
                            data: values,
                            type: 'line',
                            areaStyle: {
                                color: '#48cfcb'
                            },
                            lineStyle: {
                                color: '#219799',
                                width: 2
                            },
                            itemStyle: {
                                color: '#219799'
                            }
                        }]
                    };

                    chart.setOption(option);
                }
            });
        }
        updateChart('5d');
        $('#btn-5d').addClass('selected');

        $('#btn-5d').on('click', function() {
            $('#btn-1mo').removeClass('selected');
            $('#btn-3mo').removeClass('selected');
            $(this).addClass('selected');
            updateChart('5d');
        });

        $('#btn-1mo').on('click', function() {
            $('#btn-5d').removeClass('selected');
            $('#btn-3mo').removeClass('selected');
            $(this).addClass('selected');
            updateChart('1mo');
        });

        $('#btn-3mo').on('click', function() {
            $('#btn-1mo').removeClass('selected');
            $('#btn-5d').removeClass('selected');
            $(this).addClass('selected');
            updateChart('3mo');
        });
    });
</script>
@endsection
