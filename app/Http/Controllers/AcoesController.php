<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stichoza\GoogleTranslate\GoogleTranslate;

class AcoesController extends Controller
{
    public function index($nome) {
        $token = 'd2yPHBfNrFaEVkxP4iTLtB';

        $translator = new GoogleTranslate('pt-BR');

        $response = Http::get("https://brapi.dev/api/quote/{$nome}?modules=summaryProfile&token={$token}")['results'][0];

        if (!isset($response['summaryProfile']) && !isset($response['summaryProfile']['longBusinessSummary'])) {
            return redirect()->back();
        }

        $response['summaryProfile']['longBusinessSummary'] = $translator->translate($response['summaryProfile']['longBusinessSummary']);
        $response['summaryProfile']['sector'] = $translator->translate($response['summaryProfile']['sector']);

        return view('acoes', compact('nome', 'response'));
    }

    public function grafico(Request $request, $acao) {
        $token = 'd2yPHBfNrFaEVkxP4iTLtB';
        $query = $request->input('query');
        $period = $request->input('period', '1d');

        $response = Http::get("https://brapi.dev/api/quote/{$acao}?interval=1d&range={$period}&token={$token}");

        return response()->json($response->json());
    }
}
