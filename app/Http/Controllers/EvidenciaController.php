<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evidencia;
use Illuminate\Support\Facades\Storage;

class EvidenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    }

    public function create()
    {
        //
    }


    public function store(Request $request, $id)
    {

        $time = date("YmdHis");

        $archivo = $request->file('file');
        $archivoName = $time . $archivo->getClientOriginalName();
        $archivo->move(public_path('evidencias'), $archivoName);

        $evidencia = new Evidencia();
        $evidencia->detalle_id = $id;
        $evidencia->nombre = $archivoName;
        $evidencia->nomOriginal = $archivo->getClientOriginalName();
        $evidencia->ubicacion = 'evidencias/' . $archivoName;
        $evidencia->save();
        return $evidencia;
    }

    public function descargar($id)
    {
        $archivo = Evidencia::find($id);
        $path = public_path('evidencias').'/'.$archivo->nombre;
        return response()->download($path, $archivo->nomOriginal);  
    }

    public function destroy($id)
    {
        //Hacer eliminacion sin recargar página
        $evidencia = Evidencia::find($id);
        $path = public_path() . '/evidencias/' . $evidencia->nombre;
        if (file_exists($path)) {
            unlink($path);
        }

        $evidencia->delete();
    }
}
