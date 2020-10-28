<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autoevaluacion;
use App\Control;
use App\DetalleAutoevaluacion;
use App\Responsable;
use RealRashid\SweetAlert\Facades\Alert;

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


    public function store($id)
    {
        $autoevaluacion = Autoevaluacion::findOrFail($id);
        $controles = Control::where('activo', 1)->get();
        foreach ($controles as $control) {
            $detalle = new DetalleAutoevaluacion([
                'control_id' => $control->id,
                'autoevaluacion_id' => $autoevaluacion->id,

            ]);
            $detalle->save();
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $detalle = DetalleAutoevaluacion::findOrFail($id);
        $responsables = Responsable::where('activo', '1')->where('deposito_id', auth()->user()->deposito->id)->get();
        // dd($responsables);
        if ($detalle->autoevaluacion->deposito_id != auth()->user()->deposito->id) {
            abort(404);
        }

        return view('usr.autoevaluaciones.editar', compact('detalle', 'responsables'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'calificacion' => 'required',
            'hallazgo' => 'required',
            'plan' => 'required',
        ]);

        $detalle = DetalleAutoevaluacion::findOrFail($id);

        $detalle->calificacion = $request->get('calificacion');
        $detalle->hallazgo = $request->get('hallazgo');
        $detalle->plan = $request->get('plan');
        $detalle->fechaCompromiso = $request->get('fechaCompromiso');
        $detalle->responsable_id = $request->get('responsable_id');


        $detalle->save();
        Alert::success('Autoevaluación', 'Se ha modificado correctamente la autoevaluación');
        return redirect()->route('usr.autoevaluaciones.listar', $detalle->autoevaluacion->id);
    }


    public function destroy($id)
    {
        //
    }
}
