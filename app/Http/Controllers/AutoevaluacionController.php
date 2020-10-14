<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autoevaluacion;
use App\Control;

class AutoevaluacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('usr');
    }

    public function index($id)
    {
        $autoevaluacion = Autoevaluacion::findOrFail($id);
        if ($autoevaluacion->estatus == 1 || $autoevaluacion->deposito_id != auth()->user()->deposito->id) {
            abort(404);
        }

        $controles = Control::where('activo', 1)->get();

        return view('usr.autoevaluaciones.listar', compact('autoevaluacion', 'controles'));
    }

    public function create()
    {
    }


    public function store($id)
    {

        $autoevaluacion = new Autoevaluacion([
            'deposito_id' => auth()->user()->deposito->id,
            'asignacion_id' => $id,
        ]);

        $autoevaluacion->save();


        return redirect()->route('usr.autoevaluaciones.listar', $autoevaluacion->id);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
