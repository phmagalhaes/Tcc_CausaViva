<?php

namespace App\Http\Controllers;

use App\Models\Doador;
use App\Models\Ong;
use App\Models\User;
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
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->senha, $user->senha)) {
            return redirect('/login')->with('errorMsg', 'Email ou senha incorretos');
        }

        Auth::login($user);
        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // public function perfil()
    // {
    //     $user = Doador::where('email', auth()->user()->email)->first();
    //     return $user;
    // }
}
