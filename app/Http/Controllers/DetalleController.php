<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autoevaluacion;
use App\Control;
use App\DetalleAutoevaluacion;

class DetalleController extends Controller
{

    public function __construct()
    {
        $this->middleware('usr');
    }
    public function index()
    {
        // return view('usr.autoevaluaciones.listar')
    }

    public function create()
    {
        //
    }


    public function store($autoevaluacion, $control)
    {
        $autoevaluacion = Autoevaluacion::findOrFail($autoevaluacion);
        $control = Control::findOrFail($control);
        $detalle = new DetalleAutoevaluacion([
            'control_id' => $control->id,
            'autoevaluacion_id' => $autoevaluacion->id,

        ]);

        $detalle->save();


        return redirect()->route('usr.detalle.editar', $detalle->id);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $detalle = DetalleAutoevaluacion::findOrFail($id);

        return view('usr.autoevaluaciones.editar', compact('detalle'));
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
