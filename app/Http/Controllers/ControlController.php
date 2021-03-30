<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Control;
use App\Area;

class ControlController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adm');
    }

    public function index()
    {
        $controles = Control::all();
        return view('adm.controles.listar', compact('controles'));
    }

    public function create()
    {
        $areas = Area::where('activo', 1)->get();
        return view('adm.controles.crear', compact('areas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'referencial' => 'required',
            'riesgosDominio' => 'required',
            'riesgosClave' => 'required',
            'objetivo' => 'required',
            'guia' => 'required',
            'area_id' => 'required',
        ]);

        $control = new Control([
            'referencial' => $request->get('referencial'),
            'riesgosDominio' => $request->get('riesgosDominio'),
            'riesgosClave' => $request->get('riesgosClave'),
            'objetivo' => $request->get('objetivo'),
            'guia' => $request->get('guia'),
            'area_id' => $request->get('area_id'),
        ]);

        $control->save();

        Alert::success('Control', 'Se ha creado correctamente el control');

        return redirect()->route('adm.controles.listar');
    }

    public function edit($id)
    {
        $control = Control::findOrFail($id);
        $areas = Area::where('activo', 1)->get();

        return view('adm.controles.editar', compact('control', 'areas'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'referencial' => 'required',
            'riesgosDominio' => 'required',
            'riesgosClave' => 'required',
            'objetivo' => 'required',
            'guia' => 'required',
            'area_id' => 'required',
            'activo' => 'required',
        ]);

        $control = Control::findOrFail($id);

        $control->referencial = $request->get('referencial');
        $control->riesgosDominio = $request->get('riesgosDominio');
        $control->riesgosClave = $request->get('riesgosClave');
        $control->objetivo = $request->get('objetivo');
        $control->guia = $request->get('guia');
        $control->area_id = $request->get('area_id');
        $control->activo = $request->get('activo');


        $control->save();
        Alert::success('Control', 'Se ha modificado correctamente el control');
        return redirect()->route('adm.controles.listar');
    }

    public function show($id)
    {
        $control = Control::find($id);
        $control->area_id = $control->area->nombre;
        if ($control->activo == 1) {
            $control->activo = "Sí";
        } else {
            $control->activo = "No";
        }
        return $control;
    }

    public function destroy($id)
    {
        Control::find($id)->delete();
        Alert::success('Control', 'Se ha eliminado correctamente el control');
        return redirect()->route('adm.controles.listar');
    }
}
