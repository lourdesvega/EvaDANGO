<?php

namespace App\Http\Controllers;

use App\Autoevaluacion;
use Illuminate\Http\Request;

use App\Evidencia;
use App\Asignacion;

class ZipController extends Controller
{
    public function descargarMes($id)


    {
        $asignacion = Asignacion::findOrFail($id);


        $zip_file = storage_path('evidencias') . '/' . 'evidencias-' . $asignacion->mes . '-' . $asignacion->anio . '.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);



        $autoevaluaciones = $asignacion->autoevaluaciones;
        foreach ($autoevaluaciones as $autoevaluacion) {
            $autoevaluacion = Autoevaluacion::findOrFail($autoevaluacion->id);

            $evidencias = $autoevaluacion->evidencias;
            foreach ($evidencias as $evidencia) {
                $zip->addFile(public_path('evidencias') . '/' . $evidencia->nombre, $evidencia->nomOriginal);
            }
        }
        $zip->close();
        return response()->download($zip_file)->deleteFileAfterSend(true);
    }
}
