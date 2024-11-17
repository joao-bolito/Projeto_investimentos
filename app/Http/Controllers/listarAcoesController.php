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

            $lista_acoes = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=change_abs&sortOrder=asc&limit=40&token=$token")['stocks'];
            $nome_ranking = 'Maiores variações negativas';

        }elseif($tipo_acao == 'maiores_variacoes_positivas'){

            $lista_acoes = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=change_abs&sortOrder=desc&limit=40&token=$token")['stocks'];
            $nome_ranking = 'Maiores variações positivas';

        }elseif ($tipo_acao == 'maiores_volume_negociacao') {

            $lista_acoes = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=volume&sortOrder=desc&limit=40&token=$token")['stocks'];
            $nome_ranking = 'Miores volumes de negociações';
        }

        $translator = new GoogleTranslate('pt-BR');

        foreach ($lista_acoes as $key => $value) {
            $lista_acoes[$key]['sector'] = $translator->translate( $value['sector']);
            $lista_acoes[$key]['type'] = $translator->translate( $value['type']);
        }

        return view('listar', compact('lista_acoes', 'nome_ranking'));
    }
}
