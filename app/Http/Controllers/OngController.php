<?php

namespace App\Http\Controllers;

use App\Models\Ong;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OngController extends Controller
{
    public function show($id)
    {
        $ong = Ong::find($id);
        return view('ong.show', ["ong" => $ong]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed',
            'email' => 'required|email|unique:users,email',
            'logo' => 'required',
            'documento' => 'unique:ongs,documento',
        ], [
            'password.confirmed' => 'Senhas não conferem',
            'logo.required' => 'Insira a logo da ong',
            'documento.unique' => 'Documento já cadastrado',
            'email.unique' => 'Email já cadastrado'
        ]);

        if ($validator->fails()) {
            return redirect('/ong/cadastro')->with('errorMsg', $validator->errors()->first());
        }

        $valorBruto = $request->input('meta_financeira');
        $valorLimpo = str_replace(['R$', '.', ','], ['', '', '.'], $valorBruto);
        $valorDecimal = number_format((float)$valorLimpo, 2, '.', '');
    
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
        $ong->meta_financeira = $valorDecimal;

        $image = $request->logo;
        $extension = $image->extension();
        $hash = md5($image->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $image->move(public_path('logos'), $hash);
        $ong->logo = $hash;

        $ong->save();

        $user = new User();
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->senha = Hash::make($request->password);
        $user->tipo = "ong";
        $user->save();

        return redirect('/login')->with('sucMsg', "Cadastro realizado com sucesso");
    }

    public function create()
    {
        return view('ong.cadastro');
    }

    public function home()
    {
        $causas = [
            'Direitos Humanos e Sociais',
            'Meio Ambiente',
            'Saúde e Bem-Estar',
            'Educação e Cultura',
            'Proteção Animal'
        ];

        $direitos = Ong::where('causa', 'Direitos Humanos e Sociais')->get();
        $ambientes = Ong::where('causa', 'Meio Ambiente')->get();
        $saudes = Ong::where('causa', 'Saúde e Bem-Estar')->get();
        $culturas = Ong::where('causa', 'Educação e Cultura')->get();
        $animais = Ong::where('causa', 'Proteção Animal')->get();

        return view('ong.home', ["Direitos Humanos e Sociais" => $direitos, "Meio Ambiente" => $ambientes, "Saúde e Bem-Estar" => $saudes, "Educação e Cultura" => $culturas, "Proteção Animal" => $animais, "causas" => $causas]);
    }

    public function index()
    {
        $ongs = Ong::latest()->take(3)->get();
        return view('index', ["ongs" => $ongs]);
    }
}
