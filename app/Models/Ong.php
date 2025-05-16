<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ong extends Model
{
    protected $fillable = [
        'nome',
        'donos',
        'email',
        'documento',
        'telefone',
        'cep',
        'endereco',
        'cidade',
        'estado',
        'bairro',
        'meta_financeira',
        'senha',
        'numero',
        'causa',
        'data_criacao',
        'necessidades',
        'descricao',
    ];

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}
