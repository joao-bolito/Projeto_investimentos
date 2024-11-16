<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        
        $stocks = [];

        return view('stocks.index', compact('stocks'));
    }
}
