<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Autoevaluacion;
use App\DetalleAutoevaluacion;
use Illuminate\Http\Request;
use App\Zona;
use App\Deposito;
use App\Control;

class ResultadosController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adm');
    }
    public function menu()
    {

        $anios = Asignacion::select('anio')->distinct()->get();

        return view('adm.datos.menu', compact('anios'));
    }


    public function graficas($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $datos = (new DatosController)->datos($id);
        $region = (new DatosController)->region($id);
        $nacional = (new DatosController)->nacional($datos);
        $riesgos = (new DatosController)->riesgoAlto($datos);
        return view('adm.datos.resultados', compact('riesgos', 'nacional', 'region', 'asignacion'));
    }


    public function riesgos($anio)
    {
        $riesgosRegion = (new DatosController)->regionAnio($anio);
        $riesgosNacional = (new DatosController)->nacionalAnio($anio);

        return compact('riesgosRegion', 'riesgosNacional');
    }

    public function riesgosGrafica($aniosele)
    {
        $anios = Asignacion::select('anio')->distinct('anio')->orderBy('anio', 'desc')->get();
        $zonas = Zona::all();

        return view('adm.datos.riesgos', compact('anios', 'zonas', 'aniosele'));
    }

    public function deficiencias($anio, $region)
    {
        $zonas = Zona::all();
        $opcion = $region;
        $meses = Asignacion::select('mes')->where('anio', $anio)->distinct()->get();

        return  view('adm.datos.deficiencias', compact('opcion', 'zonas', 'meses', 'anio'));
    }

    public function datosDeficiencias($anio, $region)
    {
        if ($region == 0) {
            $riesgos = (new DatosController)->deficienciasNacional($anio, $region);
        } else {
            $riesgos = (new DatosController)->deficienciasRegion($anio, $region);
        }

        return  $riesgos;
    }


    public function datosMeses($anio, $deposito)
    {
        

        $detalles = Autoevaluacion::whereHas('asignacion', function ($query) use ($deposito, $anio){
                return $query->where('anio', $anio)->orderBy('mes', 'asc');
        })->where('deposito_id', $deposito)->with('detalleAutoevaluaciones', 'asignacion')->get();

        return $detalles;
    }

    public function meses($anio)
    {
        $zonas = Zona::all();
        $asignacion = Asignacion::where('anio', $anio)->firstOrFail();
        $anio = $asignacion->anio;
        $meses = Asignacion::distinct('anio')->where('anio', $anio)->orderBy('mes')->get();
        $controles = Control::all();
        //dd($controles);
        return view('adm.datos.mes', compact('anio', 'zonas', 'controles', 'meses'));
    }

    public function depositos($id)
    {
        return $depositos  = Deposito::where('zona_id', $id)->get();
    }
}
