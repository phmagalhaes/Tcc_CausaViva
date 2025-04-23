<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GaleriaController extends Controller
{
    public function store(Request $request)
    {
        $galeria = new Galeria;

        $image = $request->image;
        $extension = $image->extension();
        $hash = md5($image->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $image->move(public_path('galeria'), $hash);
        $galeria->caminho = $hash;

        $authUser = Ong::where('email', Auth::user()->email)->first();
        $ong = Ong::findOrFail($authUser->id);

        $galeria->id_ong = $ong->id;
        $galeria->save();

        return redirect(route('ong.perfil'))->with('sucMsg', 'Foto adicionada com sucesso');
    }
}
