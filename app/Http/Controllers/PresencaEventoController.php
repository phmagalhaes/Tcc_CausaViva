<?php

namespace App\Http\Controllers;

use App\Models\Doador;
use App\Models\Evento;
use App\Models\PresencaEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresencaEventoController extends Controller
{
    public function confirmar_presenca(Request $request, $id)
    {
        $user = Auth::user();
        $doador = Doador::where('email', $user->email)->first();
        if(!$doador){
            return redirect()->back()->with('errorMsg', 'Você precisa ser um doador para confirmar presença em um evento');
        }

        $evento = Evento::where('id', $id)->first();
        $presencas = PresencaEvento::where('id_evento', $evento->id)->count();
        if($presencas >= $evento->quantidade_pessoas){
            return redirect()->back()->with('errorMsg', 'Esse evento já atingiu a lotação máxima');
        }

        PresencaEvento::create([
            'id_doador' => $doador->id,
            'id_evento' => $evento->id
        ]);

        return redirect()->back()->with('sucMsg', 'Presença marcada com sucesso!');
    }

    public function cancelar_presenca(Request $request, $id)
    {
        $user = Auth::user();
        $doador = Doador::where('email', $user->email)->first();

        $presenca = PresencaEvento::where('id_doador', $doador->id)
                                ->where('id_evento', $id)
                                ->delete();

        return redirect()->back()->with('sucMsg', 'Presença cancelada com sucesso!');
    }
}
