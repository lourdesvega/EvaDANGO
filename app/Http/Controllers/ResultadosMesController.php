<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultadosMesController extends Controller
{
    public function graficas()
    {
        return view('adm.datos.resultados');
    }
}
