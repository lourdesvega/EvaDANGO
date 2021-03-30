<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evidencia;
use Illuminate\Support\Facades\Storage;
use App\Asignacion;
use App\Autoevaluacion;
use Illuminate\Contracts\Queue\ShouldQueue;

class EvidenciaController extends Controller implements ShouldQueue
{

    public function __construct()
    {
        $this->middleware('auth');
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
        $path = public_path('evidencias') . '/' . $archivo->nombre;
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




    public function delete($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $autoevaluaciones = $asignacion->autoevaluaciones;
        foreach ($autoevaluaciones as $autoevaluacion) {
            $autoevaluacion = Autoevaluacion::findOrFail($autoevaluacion->id);

            $evidencias = $autoevaluacion->evidencias;

            if ($evidencias != null) {
                foreach ($evidencias as $evidencia) {

                    (new EvidenciaController)->destroy($evidencia->id);
                }
            }
        }

        return redirect()->route('adm.autoevaluaciones.listar', $id);
    }
}
