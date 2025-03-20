<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Doador extends Authenticatable
{
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'telefone',
        'causa', 
        'foto'
    ];

    public $table = 'doadores';
}
