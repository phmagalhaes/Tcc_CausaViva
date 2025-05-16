<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $causas = [
            'Direitos Humanos e Sociais',
            'Meio Ambiente',
            'Saúde e Bem-Estar',
            'Educação e Cultura',
            'Proteção Animal'
        ];

        $busca = $request->get('evento');
        $filtroCausa = $request->get('causa');

        $eventosPorCausa = [];

        if ($filtroCausa) {
            // Filtra eventos onde a ONG tem a causa desejada
            $query = Evento::whereHas('ong', function ($q) use ($filtroCausa) {
                $q->where('causa', $filtroCausa);
            });

            if ($busca) {
                $query->where('nome', 'like', '%' . $busca . '%');
            }

            $eventos = $query->with('ong')->get();
            $eventosPorCausa[$filtroCausa] = $eventos;
        } else {
            // Agrupa todos os eventos por causa da ONG
            foreach ($causas as $causa) {
                $query = Evento::whereHas('ong', function ($q) use ($causa) {
                    $q->where('causa', $causa);
                });

                if ($busca) {
                    $query->where('nome', 'like', '%' . $busca . '%');
                }

                $eventos = $query->with('ong')->get();
                $eventosPorCausa[$causa] = $eventos;
            }
        }

        return view('eventos.index', [
            'causas' => $causas,
            'eventosPorCausa' => $eventosPorCausa,
            'busca' => $busca,
            'searchCausa' => $filtroCausa
        ]);
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required',
        ], [
            'foto.required' => 'Insira a foto do evento',
        ]);

        if ($validator->fails()) {
            return redirect('/evento/criar')->with('errorMsg', $validator->errors()->first());
        }

        $image = $request->foto;
        $extension = $image->extension();
        $hash = md5($image->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $image->move(public_path('uploads/eventos'), $hash);

        $valorBruto = $request->input('valor');
        $valorLimpo = str_replace(['R$', '.', ','], ['', '', '.'], $valorBruto);
        $valorDecimal = number_format((float)$valorLimpo, 2, '.', '');

        $ong = Ong::where('email', Auth::user()->email)->first();

        $evento = new Evento();
        $evento->nome = $request->nome;
        $evento->id_ong = $ong->id;
        $evento->cidade = $request->cidade;
        $evento->estado = $request->estado;
        $evento->rua = $request->rua;
        $evento->bairro = $request->bairro;
        $evento->numero = $request->numero;
        $evento->quantidade_pessoas = $request->quantidade_pessoas;
        $evento->horario_inicio = $request->horario_inicio;
        $evento->horario_fim = $request->horario_fim;
        $evento->valor = $valorDecimal;
        $evento->descricao = $request->descricao;
        $evento->foto = $hash;
        $evento->cep = $request->cep;
        $evento->data = $request->data;

        $evento->save();

        return redirect(route('ong.perfil'))->with('sucMsg', 'Evento Criado com Sucesso');
    }
}
