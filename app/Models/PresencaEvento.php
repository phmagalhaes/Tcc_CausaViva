<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresencaEvento extends Model
{
    protected $table = "presenca_eventos";

    protected $fillable = [
        'id_evento',
        'id_doador'
    ];
}
