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
</style>

@section('content')
    <section class="banner-top">
        <img src="{{ asset('image/banner-02.webp') }}" class="banner-top-img" style="background: #2A2F38;">
    </section>

    <section class="container py-3">
        <h1>Teste</h1>

        <div class="row py-2 d-flex justify-content-center">
            <div class="col-md-4" style="">
                <div class="card ranking-card mb-3" style="max-width: 400px;">
                    <div class="card-header bg-transparent">
                        <h4 class="m-0">Maiores Altas</h4>
                        <hr class="mb-0">
                    </div>

                    <div class="card-body py-1">
                        @foreach ($maiores_variacoes_positivas as $value)
                            <div class="d-flex justify-content-between align-center pb-2">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $value['logo'] }}" style="width: 40px; height: 40px;">
                                    <div class="mx-2">
                                        <h5 class="m-0">{{ $value['tickers'] }}</h5>
                                        <small>{{ $value['nome'] }}</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-caret-up" style="color: #4bf49a;"></i>
                                    <span>{{ number_format($value['variacao_porcentagem'], 2) }}%</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer bg-transparent">
                        <hr class="mt-0">
                        Footer
                    </div>
                </div>
            </div>

            <div class="col-md-4" style="">
                <div class="card ranking-card mb-3" style="max-width: 400px;">
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

            <div class="col-md-4" style="">
                <div class="card ranking-card mb-3" style="max-width: 400px;">
                    <div class="card-header bg-transparent">
                        <h4 class="m-0">Maiores Altas</h4>
                        <hr class="mb-0">
                    </div>
                    <div class="card-body py-1">
                        @foreach ($maiores_volume_negociacao as $value)
                        <div class="d-flex justify-content-between align-center pb-2">
                            <div class="d-flex align-items-center">
                                <img src="{{ $value['logo'] }}" style="width: 40px; height: 40px;">
                                <div class="mx-2">
                                    <h5 class="m-0">{{ $value['tickers'] }}</h5>
                                    <small>{{ $value['nome'] }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-caret-up" style="color: #4bf49a;"></i>
                                <span>{{ $value['variacao_porcentagem']  }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-footer bg-transparent">
                        <hr class="mt-0">
                        Footer
                    </div>
                  </div>

            </div>
        </div>

    </section>
@endsection
