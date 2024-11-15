<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ativo;
use Carbon\Carbon;

class CarteiraController extends Controller
{
    public function index(Request $request) {

        Auth::attempt([
            'email' => 'fernandozocarato@hotmail.com',
            'password' => '12345',
        ]);

        $total_por_mes = Ativo::select(
            DB::raw('DATE_FORMAT(data_de_compra, "%Y-%m") as mes'),
            DB::raw('SUM(quantidade * preco) as total_investido')
        )
        ->where('user_id', Auth::id())
        ->where('data_de_compra', '>=', Carbon::now()->subMonths(6)->startOfMonth())
        ->groupBy(DB::raw('DATE_FORMAT(data_de_compra, "%Y-%m")'))
        ->orderBy(DB::raw('DATE_FORMAT(data_de_compra, "%Y-%m")'), 'asc')
        ->get();

        $total_acumulado = 0;
        $dados_acumulados = $total_por_mes->map(function ($item) use (&$total_acumulado) {
            $total_acumulado += $item->total_investido;
            $item->total_acumulado = $total_acumulado;
            return $item;
        });

        $total_por_mes = $dados_acumulados;

        $total_carteira = Ativo::select(
            'tipo_de_ativo',
            DB::raw('SUM(quantidade * preco) as total_investido'),
            DB::raw('(SUM(quantidade * preco) / (SELECT SUM(quantidade * preco) FROM ativos WHERE user_id = ' . Auth::id() . ')) * 100 as porcentagem')
        )
        ->where('user_id', Auth::id())
        ->groupBy('tipo_de_ativo')
        ->get();

        $total_investido = Ativo::select(
            DB::raw('SUM(quantidade * preco) as total_investido'),
        )
        ->where('user_id', Auth::id())
        ->get()[0]->total_investido;

        $acoes = Ativo::select(
            'tipo_de_ativo',
            'ativo',
            DB::raw('SUM(quantidade) as quantidade_total'),
            DB::raw('SUM(quantidade * preco) / SUM(quantidade) as preco_medio'),
            DB::raw('SUM(quantidade * preco) as total')
        )
        ->where('tipo_de_ativo', 'acoes')
        ->where('user_id', Auth::id())
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
        ->where('user_id', Auth::id())
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
        ->where('user_id', Auth::id())
        ->groupBy('tipo_de_ativo', 'ativo')
        ->get();

        return view(
            'carteira',
            compact(
                'acoes',
                'fiis',
                'bdrs',
                'total_por_mes',
                'total_carteira',
                'total_investido'
            )
        );
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
