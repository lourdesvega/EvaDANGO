<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Deposito;
use App\User;
use App\Autoevaluacion;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use App\Rules\uniqueAsignacion;

class AsignacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('adm');

    }

    public function index()
    {
        $asignaciones = Asignacion::orderBy('anio', 'desc')->get();


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
            'anio' => ['required', new uniqueAsignacion($request->get('mes'))],
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

        (new AsignacionController)->notificar($asignacion->nota, $asignacion->id);


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
            'anio' => ['required', new uniqueAsignacion($request->validate->mes)],
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
        (new EvidenciaController)->delete($id);
        Asignacion::find($id)->forceDelete();


        Alert::success('Asignación', 'Se ha eliminado correctamente la asignacion');

        return redirect()->route('adm.asignaciones.listar');
    }


    public function notificar($mensaje, $id)
    {
        dispatch(new SendEmail($mensaje, $id));
    }
}
