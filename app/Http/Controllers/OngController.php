<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OngController extends Controller
{
    public function index()
    {

    }

    public function show()
    {
        return view('ong.perfil');
    }

    public function store()
    {

    }

    public function create()
    {
        return view('ong.cadastro');
    }

    public function home()
    {
        return view('index');
    }
}
