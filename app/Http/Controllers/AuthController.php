<?php

namespace App\Http\Controllers;

use App\Models\Doador;
use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $doador = Doador::where('email', $request->email)->first();
        $ong = Ong::where('email', $request->email)->first();

        if(!$doador && !$ong){
            return redirect('/login')->with('errorMsg', 'Email ou senha incorretos');
        } else if($doador && !$ong){
            if(Hash::check($request->senha, $doador->senha)){
                Auth::login($doador);
                return redirect('/home');
            } else{
                return redirect('/login')->with('errorMsg', 'Email ou senha incorretos');
            }
        } else{
            if(Hash::check($request->senha, $ong->senha)){
                Auth::login($ong);
                return redirect('/home');
            } else{
                return redirect('/login')->with('errorMsg', 'Email ou senha incorretos');
            }
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout($request->user());
        return redirect('/login');
    }
}
