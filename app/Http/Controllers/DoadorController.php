<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoadorController extends Controller
{
    public function index()
    {

    }

    public function show()
    {
        return view('doador.perfil');
    }

    public function store()
    {

    }

    public function create()
    {
        return view('doador.cadastro');
    }
}
