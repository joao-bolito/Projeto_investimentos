<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listarAcoesController extends Controller
{
    public function listar(){
        $maiores_variacoes_positivas = [
            collect([
              "tickers" => "ENMT4F",
              "nome" => "ENERGISA MT PN",
              "variacao_porcentagem" => 14.987,
              "preco" => 97.67,
              "logo" => "https://s3-symbol-logo.tradingview.com/energisa-mt-on--big.svg"
            ]),
            collect([
              "tickers" => "CGAS3",
              "nome" => "COMGAS      ON",
              "variacao_porcentagem" => 5.833,
              "preco" => 127,
              "logo" => "https://s3-symbol-logo.tradingview.com/comgas-on--big.svg"
            ]),
            collect([
              "tickers" => "PATI4",
              "nome" => "PANATLANTICAPN",
              "variacao_porcentagem" => 12.903,
              "preco" => 35,
              "logo" => "https://s3-symbol-logo.tradingview.com/panatlanticapn--big.svg"
            ]),
            collect([
              "tickers" => "CGAS5",
              "nome" => "COMGAS      PNA",
              "variacao_porcentagem" => 2.344,
              "preco" => 131,
              "logo" => "https://s3-symbol-logo.tradingview.com/comgas-on--big.svg"
            ]),
            collect([
              "tickers" => "PEAB3F",
              "nome" => "PAR AL BAHIAON",
              "variacao_porcentagem" => 5,
              "preco" => 42,
              "logo" => "https://brapi.dev/favicon.svg"
            ])
        ];

        //return($maiores_variacoes_positivas);

        return view('listarAcoes.listar', compact('maiores_variacoes_positivas'));
    }
}
