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
use RealRashid\SweetAlert\Facades\Alert;

class AutoevaluacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('usr');
    }

    public function index($id)
    {
        $autoevaluacion = Autoevaluacion::findOrFail($id);
        if ($autoevaluacion->estatus == 1 || $autoevaluacion->deposito_id != auth()->user()->deposito->id) {
            abort(404);
        }
        if ($autoevaluacion->detalleAutoevaluaciones->isEmpty()) {
            (new DetalleController)->store($autoevaluacion->id);
        }
        $autoevaluacion = Autoevaluacion::findOrFail($id);


        return view('usr.autoevaluaciones.listar', compact('autoevaluacion'));
    }


    public function show($id)
    {
        $autoevaluacion = Autoevaluacion::findOrFail($id);
        if ($autoevaluacion->estatus != 1 || $autoevaluacion->deposito_id != auth()->user()->deposito->id) {
            abort(404);
        }
        $autoevaluacion = Autoevaluacion::findOrFail($id);


        return view('usr.autoevaluaciones.ver', compact('autoevaluacion'));
    }

    public function datosAutoevalucion($id)
    {
        $autoevaluacion = Autoevaluacion::findOrFail($id);
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

    public function contar($id)
    {
        $autoevaluacion = Autoevaluacion::find($id);
        $count = DetalleAutoevaluacion::where('estatus', 0)->where('autoevaluacion_id', $autoevaluacion->id)->count();

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

        Alert::success('Autoevaluación', 'Tu autoevaluación ha sido completada');
        return redirect()->route('usr.asignaciones.listar');
    }


    public function notificar()
    {
    }
}
