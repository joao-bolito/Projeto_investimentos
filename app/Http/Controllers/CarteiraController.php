<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ativo;

class CarteiraController extends Controller
{
    public function index(Request $request) {

        $acoes = Ativo::select(
            'tipo_de_ativo',
            'ativo',
            DB::raw('SUM(quantidade) as quantidade_total'),
            DB::raw('SUM(quantidade * preco) / SUM(quantidade) as preco_medio'),
            DB::raw('SUM(quantidade * preco) as total')
        )
        ->where('tipo_de_ativo', 'acoes')
        ->groupBy('tipo_de_ativo', 'ativo')
        ->get();

        $bdrs = Ativo::select(
            'tipo_de_ativo',
            'ativo',
            DB::raw('SUM(quantidade) as quantidade_total'),
            DB::raw('SUM(quantidade * preco) / SUM(quantidade) as preco_medio'),
            DB::raw('SUM(quantidade * preco) as total')
        )
        ->where('tipo_de_ativo', 'bdrs')
        ->groupBy('tipo_de_ativo', 'ativo')
        ->get();

        $fiis = Ativo::select(
            'tipo_de_ativo',
            'ativo',
            DB::raw('SUM(quantidade) as quantidade_total'),
            DB::raw('SUM(quantidade * preco) / SUM(quantidade) as preco_medio'),
            DB::raw('SUM(quantidade * preco) as total')
        )
        ->where('tipo_de_ativo', 'fiis')
        ->groupBy('tipo_de_ativo', 'ativo')
        ->get();

        return view('carteira', compact('acoes', 'fiis', 'bdrs'));
    }

    public function adicionar_ativo(Request $request) {
        $validator = Validator::make($request->all(), [
            'tipo_de_ativo' => 'required|string',
            'ativo' => 'required|string',
            'data_de_compra' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'preco' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $ativo = Ativo::create([
            'tipo_de_ativo' => $request->input('tipo_de_ativo'),
            'ativo' => $request->input('ativo'),
            'data_de_compra' => $request->input('data_de_compra'),
            'quantidade' => $request->input('quantidade'),
            'preco' => $request->input('preco'),
            'user_id' => $request->input('user_id'),
        ]);

        session()->flash('success', 'Ativo inserido com sucesso!');

        return redirect()->back();
    }
}
