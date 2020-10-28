<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autoevaluacion;
use App\Asignacion;

class AutoevaluacionAdmController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('adm');
    }

    public function index($id){
        $asignacion = Asignacion::findOrFail($id);
        return view('adm.autoevaluaciones.listar', compact('asignacion'));
    }

    public function show($id){
        $autoevaluacion = Autoevaluacion::findOrFail($id);
        return view('adm.autoevaluaciones.ver', compact('autoevaluacion'));
    }
}
