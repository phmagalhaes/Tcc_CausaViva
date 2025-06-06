<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\Evento;
use App\Models\Galeria;
use App\Models\Ong;
use App\Models\PresencaEvento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class OngController extends Controller
{
    public function show($id)
    {
        $ong = Ong::find($id);
        $fotos = Galeria::where("id_ong", $ong->id)->get();

        $now = Carbon::now()->format('Y-m-d H:i:s');
        $eventos = Evento::where('id_ong', $ong->id)
            ->whereRaw("STR_TO_DATE(CONCAT(data, ' ', horario_inicio), '%Y-%m-%d %H:%i:%s') > ?", [$now])
            ->orderByRaw("STR_TO_DATE(CONCAT(data, ' ', horario_inicio), '%Y-%m-%d %H:%i:%s') ASC")
            ->get();

        return view('ong.show', ["ong" => $ong, "fotos" => $fotos, "eventos" => $eventos]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'documento' => preg_replace('/\D/', '', $request->documento),
            'telefone' => preg_replace('/\D/', '', $request->telefone),
            'cep' => preg_replace('/\D/', '', $request->cep),
        ]);

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
        $image->move(public_path('uploads/logos'), $hash);
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

    public function home(Request $request)
    {
        $causas = [
            'Direitos Humanos e Sociais',
            'Meio Ambiente',
            'Saúde e Bem-Estar',
            'Educação e Cultura',
            'Proteção Animal'
        ];

        $busca = $request->get('ong');
        $filtroCausa = $request->get('causa');

        $ongsPorCausa = [];

        // Se o usuário filtrou por causa, retornamos só dessa causa
        if ($filtroCausa) {
            $query = Ong::query()->where('causa', $filtroCausa);

            if ($busca) {
                $query->where('nome', 'like', '%' . $busca . '%');
            }

            $ongs = $query->get();
            $ongsPorCausa[$filtroCausa] = $ongs;
        } else {
            // Senão, busca por nome em todas as causas separadas
            foreach ($causas as $causa) {
                $query = Ong::query()->where('causa', $causa);

                if ($busca) {
                    $query->where('nome', 'like', '%' . $busca . '%');
                }

                $ongs = $query->get();
                $ongsPorCausa[$causa] = $ongs;
            }
        }

        return view('ong.home', [
            'causas' => $causas,
            'ongsPorCausa' => $ongsPorCausa,
            'busca' => $busca,
            'searchCausa' => $filtroCausa
        ]);
    }

    public function index()
    {
        $ongs = Ong::latest()->take(3)->get();
        return view('index', ["ongs" => $ongs]);
    }

    public function perfil()
    {
        $user = Ong::where("email", Auth::user()->email)->first();
        $fotos = Galeria::where("id_ong", $user->id)->get();
        return view("ong.perfil", ["user" => $user, "fotos" => $fotos]);
    }

    public function update(Request $request)
    {
        $valorBruto = $request->input('meta_financeira');
        $valorLimpo = str_replace(['R$', '.', ','], ['', '', '.'], $valorBruto);
        $valorDecimal = number_format((float)$valorLimpo, 2, '.', '');

        $request->merge([
            'documento' => preg_replace('/\D/', '', $request->documento),
            'telefone' => preg_replace('/\D/', '', $request->telefone),
            'cep' => preg_replace('/\D/', '', $request->cep),
            'meta_financeira' => $valorDecimal,
        ]);

        $authUser = Ong::where('email', Auth::user()->email)->first();
        $ong = Ong::findOrFail($authUser->id);

        $emailAntigo = $ong->email;
        $nomeAntigo = $ong->nome;
        $user = User::where('email', $emailAntigo)->first();

        if ($user) {
            $precisaAtualizar = false;

            if ($request->email != $emailAntigo) {
                $user->email = $request->email;
                $precisaAtualizar = true;
            }

            if ($request->nome != $nomeAntigo) {
                $user->nome = $request->nome;
                $precisaAtualizar = true;
            }

            if ($precisaAtualizar) {
                $user->update();
            }
        }

        $ong->update($request->all());

        return redirect(route('ong.perfil'))->with('sucMsg', 'Dados atualizados com sucesso!');
    }

    public function updateimg(Request $request)
    {
        $authUser = Ong::where('email', Auth::user()->email)->first();
        $ong = Ong::findOrFail($authUser->id);

        $imgAntiga = $ong->logo;
        $path = public_path('uploads/logos/' . $imgAntiga);
        if (file_exists($path)) {
            unlink($path);
        }

        $image = $request->logo;
        $extension = $image->extension();
        $hash = md5($image->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $image->move(public_path('uploads/logos'), $hash);
        $ong->logo = $hash;

        $ong->update();

        return redirect(route('ong.perfil'))->with('sucMsg', 'Logo alterada com sucesso!');
    }

    public function callback(Request $request)
    {
        $code = $request->query('code');
        $ongId = $request->query('state'); // Pega o ID da ONG

        $response = Http::post('https://api.mercadopago.com/oauth/token', [
            'client_id' => env('MP_CLIENT_ID'),
            'client_secret' => env('MP_CLIENT_SECRET'),
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => env('MP_REDIRECT_URI'),
        ]);

        $data = $response->json();

        $ong = Ong::find($ongId); // Busca a ONG correta

        if (!$ong) {
            return redirect(route('ong.perfil'))->with('errorMsg', 'Erro ao conectar');
        }

        $ong->mercado_pago_user_id = $data['user_id'];
        $ong->access_token = $data['access_token'];
        $ong->save();

        return redirect(route('ong.perfil'))->with('sucMsg', 'Conectado com sucesso!');
    }

    public function estatisticas(Request $request)
    {
        $authUser = Ong::where('email', Auth::user()->email)->first();
        $ong = Ong::findOrFail($authUser->id);

        $doacoes = Doacao::where('id_ong', $ong->id)->get();
        $total = 0;
        foreach ($doacoes as $doacao) {
            $total += $doacao->valor;
        }

        $doacoes = Doacao::where('id_ong', $ong->id)
            ->orderBy('created_at', 'desc')
            ->paginate(3, ['*'], 'doacoes_page');

        $eventos = Evento::where('id_ong', $ong->id)
            ->orderBy('data', 'desc')
            ->paginate(3, ['*'], 'eventos_page');

        return view('ong.estatisticas', ['total' => $total, 'doacoes' => $doacoes, 'eventos' => $eventos]);
    }

    public function redirect($id)
    {
        $ong = Ong::find($id);
        if($ong->mercado_pago_user_id == null){
            return redirect()->back()->with('errorMsg', 'Essa ONG ainda não se conectou com o Mercado Pago');
        } else{
            return redirect(route('ong.pagamento', ['id' => $id]));
        }
    }
}
