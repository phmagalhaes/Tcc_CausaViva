<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Doador;
use App\Models\Ong;

class MenuBar extends Component
{
    public $nome;
    public $foto;
    public $tipo;

    public function __construct()
    {
        $user = Auth::user();
        $this->tipo = $user->tipo;

        if ($user->tipo === 'doador') {
            $this->nome = explode(' ', $user->nome)[0];
        } else {
            $this->nome = $user->nome;
        }

        $doador = Doador::where('email', $user->email)->first();
        $ongUser = Ong::where('email', $user->email)->first();

        if ($doador && $doador->foto) {
            $this->foto = "logos/{$doador->foto}";
        } elseif ($doador && !$doador->foto) {
            $this->foto = "assets/images/menu/account.png";
        } elseif ($ongUser) {
            $this->foto = "logos/{$ongUser->logo}";
        } else {
            $this->foto = "assets/images/menu/account.png";
        }
    }

    public function render(): \Illuminate\View\View
    {
        return view('components.menu-bar');
    }
}
