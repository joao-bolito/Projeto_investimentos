@extends('layouts.app')

@section('title', 'Minha Carteira')

@section('style')
<style>
    .accordion {
        box-shadow: 0 0 10px rgba(0, 0, 0, .161);
        border-radius: 5px;
    }

    .accordion-button:focus {
        background: #22979983;
        color: #fbfbfb;
        border-color: #22979983;
        box-shadow: 0 0 0 0.25rem #22979983;
    }

    .accordion-button:not(.collapsed) {
        background: #22979983;
        color: #fbfbfb;
        border-color: #22979983;
    }

    .btn-ativo {
        background: #424242;
        box-shadow: 0 0 10px rgba(0, 0, 0, .161);
        font-weight: bold;
        color: #fbfbfb;
        border-radius: 20px;
    }

    .btn-ativo:hover {
        background: #585858;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.226);
        color: #fbfbfb;
    }

    .accordion-button:not(.collapsed) {
        --bs-accordion-btn-active-icon: url("{{ asset('image/up.svg') }}");
    }

    .accordion-button:focus {
        --bs-accordion-btn-icon: url("{{ asset('image/down.svg') }}");
    }
</style>
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- @if ($errors->any()) --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
{{-- @endif --}}



<section id="ativos">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 350px;">
            <div class="modal-content">
                <form action="{{ route('carteira.adicionar_ativo') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Adicionar Transação</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="tipo_de_ativo" class="form-label" style="font-size: 14px;">Tipo de ativo</label>
                                <select class="form-select form-select-sm" name="tipo_de_ativo">
                                    <option value="acoes">AÇÕES</option>
                                    <option value="fiis">FIIS</option>
                                    <option value="bdrs">BDRS</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="ativo" class="form-label" style="font-size: 14px;">Ativo<span style="color: red">*</span></label>
                                <input class="form-control form-control-sm" type="text" name="ativo" placeholder="CÓDIGO DO ATIVO" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="data_de_compra" class="form-label" style="font-size: 14px;">Data da compra<span style="color: red">*</span></label>
                                <input class="form-control form-control-sm" type="date" name="data_de_compra" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="quantidade" class="form-label" style="font-size: 14px;">Quantidade<span style="color: red">*</span></label>
                                <input class="form-control form-control-sm" type="number" id="quantidade" name="quantidade" value="1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="preco" class="form-label" style="font-size: 14px;">Preço em R$<span style="color: red">*</span></label>
                                <input class="form-control form-control-sm" type="text" id="preco" name="preco">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12 py-2 text-center" style="background: #22979983;color: #fbfbfb;max-width: 314px;">
                                Valor total: R$<span id="valor_total">0.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}" required>
                        <button type="button" class="btn me-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-ativo">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between m-3">
        <h3>Ativos</h3>
        <button type="button" class="btn btn-ativo" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Adicionar ativo +
        </button>
    </div>

    <div class="accordion mx-3" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button fw-bold fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Ações
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ativo</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Preço médio</th>
                                <th scope="col">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acoes as $acao)
                                <tr>
                                    <th scope="row">{{ $acao->ativo }}</th>
                                    <td>{{ $acao->quantidade_total }}</td>
                                    <td>R$ {{ number_format($acao->preco_medio, 2, ',', '.') }}</td>
                                    <td>R${{ number_format($acao->total, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    FIIs
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ativo</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Preço médio</th>
                                <th scope="col">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fiis as $fii)
                                <tr>
                                    <th scope="row">{{ $fii->ativo }}</th>
                                    <td>{{ $fii->quantidade_total }}</td>
                                    <td>R$ {{ number_format($fii->preco_medio, 2, ',', '.') }}</td>
                                    <td>R${{ number_format($fii->total, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Bdrs
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ativo</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Preço médio</th>
                                <th scope="col">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bdrs as $bdr)
                                <tr>
                                    <th scope="row">{{ $bdr->ativo }}</th>
                                    <td>{{ $bdr->quantidade_total }}</td>
                                    <td>R$ {{ number_format($bdr->preco_medio, 2, ',', '.') }}</td>
                                    <td>R${{ number_format($bdr->total, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        function atualizarValorTotal() {
            // Pega o valor do input de preço e quantidade
            var preco = parseFloat($('#preco').val()) || 0;
            var quantidade = parseInt($('#quantidade').val()) || 0;

            // Calcula o valor total
            var valorTotal = preco * quantidade;

            // Define o valor total no span
            $('#valor_total').text(valorTotal.toFixed(2));
        }

        // Adiciona evento para atualizar o valor total quando o preço ou a quantidade mudam
        $('#preco, #quantidade').on('change', atualizarValorTotal);
    });
</script>
@endsection
