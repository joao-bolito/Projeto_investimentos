<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_BASE_URL'),
        ]);
    }

    public function getStocks()
    {
        // O token Bearer
        $token = 'd2yPHBfNrFaEVkxP4iTLtB';

        // Fazendo a requisição com o cabeçalho Authorization
        $response = $this->client->request('GET', 'quote/list', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('API_TOKEN'),
            ]
        ]);

        return $response;
        $data = json_decode($response->getBody(), true);


        return view('stocks.index', compact('data')); // Retorna a view com os dados
    }
}
