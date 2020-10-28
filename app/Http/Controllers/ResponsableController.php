<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Responsable;
use App\User;

class ResponsableController extends Controller
{

    public function __construct()
    {
        $this->middleware('usr');
    }

    public function index()
    {

        $responsables = auth()->user()->deposito->responsables;

        return view('usr.responsables.listar', compact('responsables'));
    }

    public function create()
    {
        return view('usr.responsables.crear');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',

        ]);

        $responsable = new Responsable([
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'deposito_id' =>  auth()->user()->deposito->id,
        ]);

        $responsable->save();

        Alert::success('Responsanble', 'Se ha creado correctamente el responsanble');

        return redirect()->route('usr.responsables.listar');
    }


    public function edit($id)
    {

        $responsable = Responsable::findOrFail($id);
        (new ResponsableController)->verificarResponsable($responsable);
        return view('usr.responsables.editar', compact('responsable'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',

        ]);

        $responsable = Responsable::findOrFail($id);

        $responsable->nombre = $request->get('nombre');
        $responsable->apellidos = $request->get('apellidos');
        $responsable->activo = $request->get('activo');

        $responsable->save();

        Alert::success('Responsable', 'Se ha actulizado correctamente el responsanble');

        return redirect()->route('usr.responsables.listar');
    }


    public function destroy($id)
    {

        Responsable::find($id)->delete();
        Alert::success('Responsable', 'Se ha eliminado correctamente el responsable');
        return redirect()->route('usr.responsables.listar');
    }

    public function verificarResponsable($responsable)
    {
        if ($responsable->deposito->user_id != auth()->user()->id) {
            abort(404);
        }
    }
}
