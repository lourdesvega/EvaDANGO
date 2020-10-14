<?php

namespace App\Http\Controllers;

use App\Area;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

/*
Tipos de alerts
Alert::alert('Title', 'Message', 'Type');
Alert::success('Success Title', 'Success Message');
Alert::info('Info Title', 'Info Message');
Alert::warning('Warning Title', 'Warning Message');
Alert::question('Question Title', 'Question Message');
Alert::image('Image Title!','Image Description','Image URL','Image Width','Image Height');
Alert::html('Html Title', 'Html Code', 'Type');
Alert::toast('Toast Message', 'Toast Type');

 
 */

class AreaController extends Controller
{

    /*
     
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('log')->only('index');

        $this->middleware('subscribed')->except('store');
    }

     */

    public function __construct()
    {
        $this->middleware('adm');
    }

    public function index()
    {
        $areas = Area::all();
        return view('adm.areas.listar', compact('areas'));
    }


    public function create()
    {
        return view('adm.areas.crear');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'macro' => 'required',
            'abreviacion' => 'required',

        ]);

        $area = new Area([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'macro' => $request->get('macro'),
            'abreviacion' => $request->get('abreviacion'),
        ]);

        $area->save();

        Alert::success('Área', 'Se ha creado correctamente el área');

        return redirect()->route('adm.areas.listar');
    }


    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('adm.areas.editar', compact('area'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'macro' => 'required',
            'abreviacion' => 'required',
            'activo' => 'required',
        ]);

        $area = Area::findOrFail($id);

        $area->nombre = $request->get('nombre');
        $area->descripcion = $request->get('descripcion');
        $area->macro = $request->get('macro');
        $area->abreviacion = $request->get('abreviacion');
        $area->activo = $request->get('activo');


        $area->save();
        Alert::success('Área', 'Se ha modificado correctamente el área');
        return redirect()->route('adm.areas.listar');
    }


    public function destroy($id)
    {

        Area::find($id)->delete();
        Alert::success('Área', 'Se ha eliminado correctamente el área');
        return redirect()->route('adm.areas.listar');
    }
}
