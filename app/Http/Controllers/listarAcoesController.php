<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stichoza\GoogleTranslate\GoogleTranslate;

class listarAcoesController extends Controller
{
    public function listar(Request $r, $tipo_acao){

        $token = 'd2yPHBfNrFaEVkxP4iTLtB';

        if($tipo_acao == 'maiores_variacoes_negativas'){

            $lista_acoes = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=change_abs&sortOrder=asc&limit=5&token=$token")['stocks'];

        }elseif($tipo_acao == 'maiores_variacoes_positivas'){

            $lista_acoes = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=change_abs&sortOrder=desc&limit=5&token=$token")['stocks'];

        }elseif ($tipo_acao == 'maiores_volume_negociacao') {

            $lista_acoes = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=volume&sortOrder=desc&limit=5&token=$token")['stocks'];
        }

        $translator = new GoogleTranslate('pt-BR');

        //return($lista_acoes);

        // foreach ($lista_acoes as $key => $value) {
        //     $lista_acoes =
        //     $response['summaryProfile']['sector'] = $translator->translate($response['summaryProfile']['sector']);
        // }


        return view('listarAcoes.listar', compact('lista_acoes'));
    }
}
