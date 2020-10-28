<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignacion;
use App\Deposito;
use App\Http\Controllers\AutoevaluacionController;

use RealRashid\SweetAlert\Facades\Alert;


class AsignacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('adm');
    }

    public function index()
    {
        $asignaciones = Asignacion::all();
        
        return view('adm.asignaciones.listar', compact('asignaciones'));
    }

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

        (new AutoevaluacionController)->store($asignacion->id);

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
}
