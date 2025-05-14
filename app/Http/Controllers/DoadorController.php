<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\Doador;
use App\Models\PresencaEvento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoadorController extends Controller
{
    public function index() {}

    public function show()
    {
        return view('doador.perfil');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed',
            'email' => 'required|email|unique:users,email',
        ], [
            'password.confirmed' => 'Senhas não conferem',
            'email.unique' => 'Email já cadastrado',
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

        $user = new User();
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->senha = Hash::make($request->password);
        $user->tipo = "doador";
        $user->save();

        return redirect('/login')->with('sucMsg', "Cadastro realizado com sucesso");
    }

    public function create()
    {
        return view('doador.cadastro');
    }

    public function perfil()
    {
        $user = Doador::where("email", Auth::user()->email)->first();
        $causas = ["Direitos Humanos e Sociais", "Meio Ambiente", "Proteção Animal", "Saúde e Bem-Estar", "Educação e Cultura"];
        $doacoes = Doacao::where('id_doador', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        $eventos = PresencaEvento::where('id_doador', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        return view("doador.perfil", ["user" => $user, "causas" => $causas, "doacoes" => $doacoes, "eventos" => $eventos]);
    }

    public function update(Request $request)
    {
        $authUser = Doador::where('email', Auth::user()->email)->first();
        $doador = Doador::findOrFail($authUser->id);

        $emailAntigo = $doador->email;
        $nomeAntigo = $doador->nome;
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

        $doador->update($request->all());

        return redirect(route('doador.perfil'))->with('sucMsg', 'Dados atualizados com sucesso!');
    }

    public function updateimg(Request $request)
    {
        $authUser = Doador::where('email', Auth::user()->email)->first();
        $doador = Doador::findOrFail($authUser->id);

        if ($doador->foto != null) {
            $imgAntiga = $doador->foto;
            $path = public_path('fotos/' . $imgAntiga);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $image = $request->foto;
        $extension = $image->extension();
        $hash = md5($image->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $image->move(public_path('fotos'), $hash);
        $doador->foto = $hash;

        $doador->update();

        return redirect(route('doador.perfil'))->with('sucMsg', 'Foto alterada com sucesso!');
    }

    public function removeimg()
    {
        $authUser = Doador::where('email', Auth::user()->email)->first();
        $doador = Doador::findOrFail($authUser->id);

        if ($doador->foto != null) {
            $imgAntiga = $doador->foto;
            $path = public_path('fotos/' . $imgAntiga);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $doador->foto = null;
        $doador->update();

        return redirect(route('doador.perfil'))->with('sucMsg', 'Foto removida com sucesso!');
    }
}
