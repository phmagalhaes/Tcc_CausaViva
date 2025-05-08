<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    public $table = "doacoes";

    protected $fillable = [
        "id_ong",
        "id_doador",
        "valor"
    ];
}
