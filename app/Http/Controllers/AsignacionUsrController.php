<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignacion;


class AsignacionUsrController extends Controller
{


    public function __construct()
    {
        $this->middleware('usr');
    }

    public function index()
    {
        $asignacion = Asignacion::where('activo', 1)->where('estatus', 0)->orWhere('estatus', 1)->first();
       // dd($asignacion);
        $asignaciones = Asignacion::where('activo', 1)->where('estatus', 2)->get();
        return view('usr.asignaciones.listar', compact('asignaciones', 'asignacion'));
    }

    public function verificarResponsable($responsable)
    {
        if ($responsable->deposito->user_id != auth()->user()->id) {
            abort(404);
        }
    }


    /*
    public function create()
    {
        return view('adm.asignaciones.crear');
    }


    public function store(Request $request)
    {
        $request->validate([
            'fechaEntrega' => 'required',
            'mes' => 'required',
            'anio' => 'required',
            'nota' => 'required',
        ]);

        $asignacion = new Asignacion([
            'fechaEntrega' => $request->get('fechaEntrega'),
            'mes' => $request->get('mes'),
            'anio' => $request->get('anio'),
            'nota' => $request->get('nota'),
            'total' => Deposito::where('activo', 1)->count(),
        ]);

        $asignacion->save();

        Alert::success('Asignación', 'Se ha creado correctamente la asignación');

        return redirect()->route('adm.asignaciones.listar');
    }

    public function edit($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        return view('adm.asignaciones.editar', compact('asignacion'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'fechaEntrega' => 'required',
            'mes' => 'required',
            'anio' => 'required',
            'nota' => 'required',
            'activo' => 'required'
        ]);

        $asignacion = Asignacion::find($id);
        $asignacion->fechaEntrega = $request->get('fechaEntrega');
        $asignacion->mes = $request->get('mes');
        $asignacion->anio = $request->get('anio');
        $asignacion->nota = $request->get('nota');
        $asignacion->activo = $request->get('activo');


        $asignacion->save();


        Alert::success('Asignación', 'Se ha modificado correctamente la asignación');

        return redirect()->route('adm.asignaciones.listar');
    }


    public function destroy($id)
    {
        Asignacion::find($id)->delete();

        Alert::success('Asignación', 'Se ha eliminado correctamente el asignacion');

        return redirect()->route('adm.asignaciones.listar');
    }
    */
}
