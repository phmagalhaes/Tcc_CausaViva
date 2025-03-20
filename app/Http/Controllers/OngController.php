<?php

namespace App\Http\Controllers;

use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OngController extends Controller
{
    public function index() {}

    public function show()
    {
        return view('ong.perfil');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed',
            'email' => 'unique:doadores,email|unique:ongs,email',
            'logo' => 'required',
        ], [
            'password.confirmed' => 'Senhas não conferem',
            'email.unique' => 'Email já cadastrado',
            'logo.required' => 'Insira a logo da ong',
        ]);

        if ($validator->fails()) {
            return redirect('/ong/cadastro')->with('errorMsg', $validator->errors()->first());
        }

        $ong = new Ong();
        $ong->nome = $request->nome;
        $ong->donos = $request->donos;
        $ong->email = $request->email;
        $ong->senha = Hash::make($request->password);
        $ong->documento = $request->documento;
        if (strlen($request->documento) > 11) {
            $ong->tipo_documento = 'CNPJ';
        } else {
            $ong->tipo_documento = 'CPF';
        }
        $ong->causa = $request->causa;
        $ong->data_criacao = $request->data_criacao;
        $ong->cep = $request->cep;
        $ong->estado = $request->estado;
        $ong->cidade = $request->cidade;
        $ong->bairro = $request->bairro;
        $ong->rua = $request->rua;
        $ong->numero = $request->numero;
        $ong->telefone = $request->telefone;
        $ong->descricao = $request->descricao;
        $ong->necessidades = $request->necessidades;
        $ong->meta_financeira = $request->meta_financeira;

        $image = $request->logo;
        $extension = $image->extension();
        $hash = md5($image->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $image->move(public_path('logos'), $hash);
        $ong->logo = $hash;

        $ong->save();

        return redirect('/login')->with('sucMsg', "Cadastro realizado com sucesso");
    }

    public function create()
    {
        return view('ong.cadastro');
    }

    public function home()
    {
        return view('index');
    }
}
