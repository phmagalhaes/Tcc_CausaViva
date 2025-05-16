<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";

    protected $fillable = [
        'id_ong',
        'nome',
        'descricao',
        'foto',
        'cep',
        'estado',
        'cidade',
        'rua',
        'bairro',
        'numero',
        'data',
        'horario_inicio',
        'horario_fim',
        'quantidade_pessoas'
    ];

    public function ong()
    {
        return $this->belongsTo(Ong::class, 'id_ong');
    }
}
