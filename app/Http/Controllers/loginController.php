<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){

        return view('login.index');
    }

    public function cadastrar(Request $r){

        $usuario = new User;

        $usuario->name = $r->input('userName');
        $usuario->email = $r->input('email');
        $usuario->password = bcrypt($r->input('txtSenha'));
        $usuario->email_verified_at = null;

        $usuario->save();

        return view('login.index');
    }



    public function entrar(){
        return view('login.entrar');
    }



    public function validaEntrar(Request $r){
        $emailUsuario = $r->input('email');
        $senhaUsuario = $r->input('txtSenha');

        $usuario = User::where('email', $emailUsuario)->first();

        if($usuario && Hash::check($senhaUsuario, $usuario->password)){
            Auth::attempt([
                'email' => $emailUsuario,
                'password' => $senhaUsuario,
            ]);

            return redirect()->route('home')->with('success, login realizado com sucesso');
        }else{
            return redirect()->back()->with('error', true);
        }
    }
}
