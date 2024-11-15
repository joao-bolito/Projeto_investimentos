<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index() {
        $token = 'd2yPHBfNrFaEVkxP4iTLtB';

        $maiores_variacoes_negativas = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=change_abs&sortOrder=asc&limit=5&token=$token")['stocks'];

        $maiores_variacoes_positivas = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=change_abs&sortOrder=desc&limit=5&token=$token")['stocks'];

        $maiores_volume_negociacao = Http::get(env('API_BASE_URL'). "quote/list?type=stock&sortBy=volume&sortOrder=desc&limit=5&token=$token")['stocks'];

        $fiis = Http::get(env('API_BASE_URL'). "quote/list?type=fund&limit=10&token=$token")['stocks'];

        return view('dashboard', compact('maiores_variacoes_positivas', 'maiores_variacoes_negativas', 'maiores_volume_negociacao', 'fiis'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $token = 'd2yPHBfNrFaEVkxP4iTLtB';

        $response = Http::get("https://brapi.dev/api/quote/list?search={$query}&token=$token")['stocks'];

        return $response;
    }
}
