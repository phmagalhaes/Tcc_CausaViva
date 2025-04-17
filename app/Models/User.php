<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = ['nome', 'email', 'senha', 'tipo', 'logo'];

    public function getAuthPassword()
    {
        return $this->senha; // se o campo do banco for `senha` e não `password`
    }
}
