@extends('layouts.app')

@section('title', 'Página Inicial')

<style>
    .banner-top {
        align-content: center;
        align-items: center;
        display: flex;
        flex-direction: column;
        height: 400px;
        justify-content: center;
        position: relative;
        width: 100%;
        z-index: 1;
    }

    .card-footer a {
        text-decoration: none !important;
        color: inherit !important;
        background: none;
        border: none;
        padding: 0;
        margin: 0;
        font-size: inherit;
        font-weight: normal;
    }

    .banner-top-img {
        background: #2A2F38;
        height: 100%;
        left: 0;
        -o-object-fit: cover;
        object-fit: cover;
        -o-object-position: center;
        object-position: center;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    .ranking-card {
        border-radius: 10px !important;
    }

    .ranking-card .card-header {
        border-bottom: 0px;
    }

    .ranking-card .card-footer {
        border-top: 0px;
    }

    #dicas a {
        color: #F5F5F5;
    }

    #dicas a.active {
        color: #229799;
    }

    #dicas h4 {
        color: #229799;
    }

    .acao:hover {
        background: #424242;
        color: #F5F5F5;
        cursor: pointer;
    }

    #btn-ranking {
        border: 1px solid #d2d2d2;
        border-radius: 10px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
    }

    #btn-ranking:hover {
        border: 1px solid #d2d2d2;
        background: #424242;
        color: #F5F5F5;
        border-radius: 10px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
    }
</style>

@section('content')
    <section class="banner-top">
        <img src="{{ asset('image/banner-02.webp') }}" class="banner-top-img" style="background: #2A2F38;">
    </section>

    <section class="container py-3" style="color: #424242">
        <h2 class="py-2"><i class="fa-solid fa-chart-line"></i> Rankings de Ações</h2>

        <div class="row py-2 d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card ranking-card mb-3" style="max-width: 400px;">
                    <div class="card-header bg-transparent">
                        <h4 class="m-0">Maiores Altas</h4>
                        <hr class="my-2">
                    </div>

                    <div class="card-body py-1">
                        @foreach ($maiores_variacoes_positivas as $value)
                            <div class="d-flex acao justify-content-between align-center py-2 px-1"
                                style="border-radius: 5px;">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $value['logo'] }}" style="width: 40px; height: 40px;">
                                    <div class="mx-2">
                                        <h5 class="m-0">{{ $value['tickers'] }}</h5>
                                        <small>{{ $value['nome'] }}</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-caret-up" style="color: #4bf49a;"></i>
                                    &nbsp;
                                    <span>{{ number_format($value['variacao_porcentagem'], 2) }}%</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer bg-transparent">
                        <hr class="my-2">
                        <a href="">
                            <div id="btn-ranking" class="d-flex justify-content-center p-2 my-2">
                                <div class="d-flex justify-content-between align-items-center col-md-10">
                                    <span>Ver mais</span>
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card ranking-card mb-3" style="max-width: 400px;">
                    <div class="card-header bg-transparent">
                        <h4 class="m-0">Maiores Baixas</h4>
                        <hr class="my-2">
                    </div>
                    <div class="card-body py-1">
                        @foreach ($maiores_variacoes_negativas as $value)
                            <div class="d-flex acao justify-content-between align-center py-2 px-1"
                                style="border-radius: 5px;">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $value['logo'] }}" style="width: 40px; height: 40px;">
                                    <div class="mx-2">
                                        <h5 class="m-0">{{ $value['tickers'] }}</h5>
                                        <small>{{ $value['nome'] }}</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-caret-down" style="color: #f44b4b;"></i>
                                    &nbsp;
                                    <span>
                                        @if ($value['variacao_porcentagem'] < 0)
                                            {{ number_format($value['variacao_porcentagem'], 2) * -1 }}%
                                        @else
                                            {{ number_format($value['variacao_porcentagem'], 2) }}%
                                        @endif
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer bg-transparent">
                        <hr class="my-2">
                        <a href="">
                            <div id="btn-ranking" class="d-flex justify-content-center p-2 my-2">
                                <div class="d-flex justify-content-between align-items-center col-md-10">
                                    <span>Ver mais</span>
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card ranking-card mb-3" style="max-width: 400px;">
                    <div class="card-header bg-transparent">
                        <h4 class="m-0">Maiores Volumes de Negociações</h4>
                        <hr class="my-2">
                    </div>
                    <div class="card-body py-1">
                        @foreach ($maiores_volume_negociacao as $value)
                            <div class="d-flex justify-content-between align-center py-2">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $value['logo'] }}" style="width: 40px; height: 40px;">
                                    <div class="mx-2">
                                        <h5 class="m-0">{{ $value['tickers'] }}</h5>
                                        <small>{{ $value['nome'] }}</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-caret-up" style="color: #4bf49a;"></i>
                                    <span>{{ $value['variacao_porcentagem'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer bg-transparent">
                        <hr class="my-2">
                        <a href="">
                            <div id="btn-ranking" class="d-flex justify-content-center p-2 my-2">
                                <div class="d-flex justify-content-between align-items-center col-md-10">
                                    <span>Ver mais</span>
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="dicas" class="py-4" style="background: #424242; color: #F5F5F5">
        <div class="container">
            <h2 class="pb-2"><i class="fa-regular fa-lightbulb"></i> Dicas</h2>
            <ul class="nav nav-tabs" id="investmentTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="intro-tab" data-bs-toggle="tab" href="#intro" role="tab"
                        aria-controls="intro" aria-selected="true">Introdução ao Mercado de Ações</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="types-tab" data-bs-toggle="tab" href="#types" role="tab"
                        aria-controls="types" aria-selected="false">Tipos de Investimentos Disponíveis</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="diversification-tab" data-bs-toggle="tab" href="#diversification"
                        role="tab" aria-controls="diversification" aria-selected="false">Diversificação</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="planning-tab" data-bs-toggle="tab" href="#planning" role="tab"
                        aria-controls="planning" aria-selected="false">Planejamento Financeiro</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="longterm-tab" data-bs-toggle="tab" href="#longterm" role="tab"
                        aria-controls="longterm" aria-selected="false">Longo Prazo vs. Curto Prazo</a>
                </li>
            </ul>

            <div class="tab-content" id="investmentTabContent">
                <div class="tab-pane fade show active p-4" id="intro" role="tabpanel" aria-labelledby="intro-tab">
                    <h4>Introdução ao Mercado de Ações</h4>
                    <p>
                        Investir no mercado de ações é uma forma de colocar o seu dinheiro para trabalhar em empresas de
                        diversos setores. Ao investir, você se torna sócio de grandes empresas e tem a chance de participar
                        do crescimento delas ao longo do tempo. No longo prazo, o mercado de ações tem mostrado resultados
                        positivos para quem diversifica e investe de forma consciente.
                    </p>
                </div>
                <div class="tab-pane fade p-4" id="types" role="tabpanel" aria-labelledby="types-tab">
                    <h4>Tipos de Investimentos Disponíveis</h4>
                    <p>
                        O mercado oferece uma grande variedade de investimentos, desde ações, títulos públicos e fundos de
                        investimento até produtos de renda fixa e variável. Cada tipo de investimento tem suas
                        características, retornos esperados e riscos associados. Entender as diferenças é essencial para
                        fazer escolhas alinhadas ao seu perfil de investidor.
                    </p>
                </div>
                <div class="tab-pane fade p-4" id="diversification" role="tabpanel"
                    aria-labelledby="diversification-tab">
                    <h4>Diversificação</h4>
                    <p>
                        A diversificação é a prática de distribuir seus investimentos em diferentes tipos de ativos, setores
                        e mercados para reduzir o impacto de uma possível queda em um único ativo. Ao diversificar, você
                        aumenta as chances de retorno e diminui o risco geral da sua carteira.
                    </p>
                </div>
                <div class="tab-pane fade p-4" id="planning" role="tabpanel" aria-labelledby="planning-tab">
                    <h4>Planejamento Financeiro</h4>
                    <p>
                        Um bom planejamento financeiro começa com objetivos claros. Quer seja para a aposentadoria, para a
                        compra de um imóvel ou para garantir um futuro tranquilo, definir metas e prazos ajuda você a
                        escolher as melhores estratégias de investimento. Invista com um propósito e aproveite as
                        recompensas no futuro.
                    </p>
                </div>
                <div class="tab-pane fade p-4" id="longterm" role="tabpanel" aria-labelledby="longterm-tab">
                    <h4>Longo Prazo vs. Curto Prazo</h4>
                    <p>
                        Investir no curto prazo pode ser uma estratégia interessante, mas os melhores resultados geralmente
                        vêm com o tempo. O longo prazo permite que você aproveite o efeito dos juros compostos, aumentando
                        os seus rendimentos e minimizando o impacto de flutuações momentâneas do mercado.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ranking-card mb-3">
                        <div class="card-header bg-transparent">
                            <h4 class="m-0">Maiores Altas</h4>
                            <hr class="mb-0">
                        </div>
                        <div class="card-body py-1">
                            @foreach ($maiores_variacoes_negativas as $value)
                                <p>{{ $value['nome'] }}</p>
                            @endforeach
                        </div>
                        <div class="card-footer bg-transparent">
                            <hr class="mt-0">
                            Footer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
