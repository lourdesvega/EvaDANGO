<?php

namespace App\Http\Controllers;

use App\Asignacion;
use Illuminate\Http\Request;
use App\Autoevaluacion;
use App\Control;
use App\User;
use App\Deposito;
use App\DetalleAutoevaluacion;
use App\Http\Controllers\DetalleController;

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
        //dd( $autoevaluacion->detalleAutoevaluaciones);
        if ($autoevaluacion->detalleAutoevaluaciones->isEmpty()) {
            (new DetalleController)->store($autoevaluacion->id);
        }

        //return redirect()->route('usr.detalle.editar', $detalle->id);


        return view('usr.autoevaluaciones.listar', compact('autoevaluacion'));
    }

    public function datosAutoevalucion($id)
    {
        $autoevaluacion = Autoevaluacion::findOrFail($id);
    }


    public function create()
    {
    }


    public function store($id)
    {
        $depositos = Deposito::where('activo', 1)->get();


        foreach ($depositos as $deposito) {
            $autoevaluacion = new Autoevaluacion([
                'deposito_id' => $deposito->id,
                'asignacion_id' => $id,
            ]);
            $autoevaluacion->save();
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
    }

    public function contar($id){
        $autoevaluacion=Autoevaluacion::find($id);
        $count = DetalleAutoevaluacion::where('estatus', 0)->where('autoevaluacion_id',$autoevaluacion->id)->count();
        return $count;
    }


    public function update($id)
    {
        $autoevaluacion = Autoevaluacion::findOrFail($id);

        $autoevaluacion->estatus = 1;

        $autoevaluacion->save();

        $asignacion = $autoevaluacion->asignacion;
        $asignacion->completado = $asignacion->completado + 1;
        if ($asignacion->completado == $asignacion->total) {
            $asignacion->estatus = 1;
        }

        $asignacion->save();
        
    }


    public function destroy($id)
    {
        //
    }
}
