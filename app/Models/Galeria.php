<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    public $table = "galeria_ongs";

    protected $fillable = [
        "id_ong",
        "caminho"
    ];
}
