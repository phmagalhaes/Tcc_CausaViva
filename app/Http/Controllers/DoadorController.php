<?php

namespace App\Http\Controllers;

use App\Models\Doador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoadorController extends Controller
{
    public function index()
    {

    }

    public function show()
    {
        return view('doador.perfil');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed',
            'email' => 'unique:doadores,email|unique:ongs,email',
        ], [
            'password.confirmed' => 'Senhas não conferem',
            'email.unique' => 'Email já cadastrado'
        ]);
 
        if ($validator->fails()) {
            return redirect('/doador/cadastro')->with('errorMsg', $validator->errors()->first());
        }

        $doador = new Doador();
        $doador->nome = $request->nome;
        $doador->email = $request->email;
        $doador->senha = Hash::make($request->password);
        $doador->telefone = $request->telefone;
        $doador->causa = $request->causa;
        $doador->save();

        return redirect('/login')->with('sucMsg', "Cadastro realizado com sucesso");
    }

    public function create()
    {
        return view('doador.cadastro');
    }
}
