<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index() {
        $token = 'd2yPHBfNrFaEVkxP4iTLtB';

        // $maiores_variacoes_negativas_request = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=change_abs&sortOrder=asc&limit=5&token=$token")['stocks'];

        // $maiores_variacoes_positivas_request = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=change_abs&sortOrder=desc&limit=5&token=$token")['stocks'];

        // $maiores_volume_negociacao_request = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=volume&sortOrder=desc&limit=5&token=$token")['stocks'];

        // foreach ($maiores_variacoes_negativas_request as $key => $value) {
        //     $stock = Http::get(env('API_BASE_URL'). "quote/{$value['stock']}?token=$token")['results'][0];

        //     $maiores_variacoes_negativas[] = [
        //         "tickers"              => $stock['symbol'],
        //         "nome"                 => $stock['shortName'],
        //         "variacao_porcentagem" => $stock['regularMarketChangePercent'],
        //         "preco"                => $stock['regularMarketPrice'],
        //         "logo"                 => $stock['logourl'],
        //     ];
        // }

        // foreach ($maiores_variacoes_positivas_request as $key => $value) {
        //     $stock = Http::get(env('API_BASE_URL'). "quote/{$value['stock']}?token=$token")['results'][0];

        //     $maiores_variacoes_positivas[] = [
        //         "tickers"              => $stock['symbol'],
        //         "nome"                 => $stock['shortName'],
        //         "variacao_porcentagem" => $stock['regularMarketChangePercent'],
        //         "preco"                => $stock['regularMarketPrice'],
        //         "logo"                 => $stock['logourl'],
        //     ];
        // }

        // foreach ($maiores_volume_negociacao_request as $key => $value) {
        //     $stock = Http::get(env('API_BASE_URL'). "quote/{$value['stock']}?token=$token")['results'][0];

        //     $maiores_volume_negociacao[] = [
        //         "tickers"              => $stock['symbol'],
        //         "nome"                 => $stock['shortName'],
        //         "variacao_porcentagem" => $stock['regularMarketChangePercent'],
        //         "preco"                => $stock['regularMarketPrice'],
        //         "volume"                => $stock['regularMarketVolume'],
        //         "logo"                 => $stock['logourl'],
        //     ];
        // }

        $maiores_volume_negociacao = [
            collect([
              "tickers" => "PDGR3",
              "nome" => "PDG REALT   ON      NM",
              "variacao_porcentagem" => 0,
              "preco" => 0.01,
              "volume" => 109300000,
              "logo" => "https://s3-symbol-logo.tradingview.com/pdg-realt--big.svg"
            ]),
            collect([
              "tickers" => "HAPV3",
              "nome" => "HAPVIDA     ON      NM",
              "variacao_porcentagem" => -3.7039999999999997,
              "volume" => 109300000,
              "logo" => "https://s3-symbol-logo.tradingview.com/hapvida--big.svg"
            ]),
            collect([
              "tickers" => "USIM5",
              "nome" => "USIMINAS    PNA     N1",
              "variacao_porcentagem" => 4.239,
              "volume" => 109300000,
              "logo" => "https://s3-symbol-logo.tradingview.com/usiminas-pna-n1--big.svg"
            ]),
            collect([
              "tickers" => "VALE3",
              "nome" => "VALE        ON      NM",
              "variacao_porcentagem" => 3.4000000000000004,
              "volume" => 109300000,
              "logo" => "https://s3-symbol-logo.tradingview.com/vale--big.svg"
            ]),
            collect([
              "tickers" => "PETR4",
              "nome" => "PETROBRAS   PN      N2",
              "variacao_porcentagem" => 0.696,
              "volume" => 109300000,
              "logo" => "https://s3-symbol-logo.tradingview.com/brasileiro-petrobras--big.svg"
            ])
        ];

        $maiores_variacoes_positivas = [
            collect([
              "tickers" => "ENMT4F",
              "nome" => "ENERGISA MT PN",
              "variacao_porcentagem" => 14.987,
              "volume" => 109300000,
              "logo" => "https://s3-symbol-logo.tradingview.com/energisa-mt-on--big.svg"
            ]),
            collect([
              "tickers" => "CGAS3",
              "nome" => "COMGAS      ON",
              "variacao_porcentagem" => 5.833,
              "preco" => 127,
              "volume" => 109300000,
              "logo" => "https://s3-symbol-logo.tradingview.com/comgas-on--big.svg"
            ]),
            collect([
              "tickers" => "PATI4",
              "nome" => "PANATLANTICAPN",
              "variacao_porcentagem" => 12.903,
              "preco" => 35,
              "volume" => 109300000,
              "logo" => "https://s3-symbol-logo.tradingview.com/panatlanticapn--big.svg"
            ]),
            collect([
              "tickers" => "CGAS5",
              "nome" => "COMGAS      PNA",
              "variacao_porcentagem" => 2.344,
              "preco" => 131,
              "volume" => 109300000,
              "logo" => "https://s3-symbol-logo.tradingview.com/comgas-on--big.svg"
            ]),
            collect([
              "tickers" => "PEAB3F",
              "nome" => "PAR AL BAHIAON",
              "variacao_porcentagem" => 5,
              "preco" => 42,
              "volume" => 109300000,
              "logo" => "https://brapi.dev/favicon.svg"
            ])
        ];

        $maiores_variacoes_negativas = [
            collect([
              "tickers" => "EKTR3F",
              "nome" => "ELEKTRO     ON",
              "variacao_porcentagem" => 9.957,
              "preco" => 42.8,
              "logo" => "https://s3-symbol-logo.tradingview.com/elektro-pn--big.svg"
            ]),
            collect([
              "tickers" => "FRIO3",
              "nome" => "METALFRIO   ON      NM",
              "variacao_porcentagem" => -4.585999999999999,
              "preco" => 145,
              "logo" => "https://brapi.dev/favicon.svg"
            ]),
            collect([
              "tickers" => "CEEB5",
              "nome" => "COELBA      PNA",
              "variacao_porcentagem" => -8.462,
              "preco" => 35.7,
              "logo" => "https://s3-symbol-logo.tradingview.com/coelba-pna--big.svg"
            ]),
            collect([
              "tickers" => "IRBR3",
              "nome" => "IRBBRASIL REON      NM",
              "variacao_porcentagem" => -6.49,
              "preco" => 41.35,
              "logo" => "https://s3-symbol-logo.tradingview.com/irbbrasil-reon--big.svg"
            ]),
            collect([
              "tickers" => "IRBR3F",
              "nome" => "IRBBRASIL REON      NM",
              "variacao_porcentagem" => -6.49,
              "preco" => 41.35,
              "logo" => "https://s3-symbol-logo.tradingview.com/irbbrasil-reon--big.svg"
            ])
        ];

        return view('dashboard', compact('maiores_variacoes_positivas', 'maiores_variacoes_negativas', 'maiores_volume_negociacao'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $token = 'd2yPHBfNrFaEVkxP4iTLtB';

        $response = Http::get("https://brapi.dev/api/quote/list?search={$query}&token=$token");

        return response()->json($response->json());
    }
}
