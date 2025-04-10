<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doador extends Model
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
