<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class QuoteController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_BASE_URL'), // URL base da API
        ]);
    }

    public function listQuotes()
    {
        $token = 'd2yPHBfNrFaEVkxP4iTLtB'; // seu token Bearer

        return Http::get(env('API_BASE_URL'). "quote/list?token=$token" );
    }
}
