<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Autoevaluacion;
use App\DetalleAutoevaluacion;
use Illuminate\Http\Request;
use App\Zona;
use App\Deposito;
use App\Control;
use Illuminate\Support\Facades\DB;
use App\Area;
use Psy\CodeCleaner\ReturnTypePass;

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

    public function menuMes($anio)
    {
        $autoevaluaciones = Asignacion::where('anio', $anio)->orderBy('mes')->get();
        return view('adm.datos.menuMes', compact('autoevaluaciones'));
    }


    public function graficas($id)
    {

        $asignacion = Asignacion::findOrFail($id);
        $datos = (new DatosController)->datos($id);
        //$region = (new DatosController)->region($id);
        $nacional = (new DatosController)->nacional($datos);
        $riesgos = (new DatosController)->riesgoAlto($datos);


        $regiones = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('zonas', 'zonas.id', 'depositos.zona_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->selectRaw('zonas.nombre, zonas.id,
        count(case detalleautoevaluaciones.calificacion when "Riesgo bajo" then 1 else null end)*100/count(*) as rb,
        count(case detalleautoevaluaciones.calificacion when "Riesgo bajo con observación" then 1 else null end)*100/count(*) as rbo,
        count(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else null end)*100/count(*) as ra')
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->where('asignaciones.id', $id)
            ->groupByRaw('zonas.id, zonas.nombre')
            ->get();



        return view('adm.datos.resultados', compact('riesgos', 'nacional', 'regiones', 'asignacion'));
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
        $meses = Asignacion::select('mes')->where('anio', $anio)->distinct()->orderBy('mes')->get();
        //$riesgos = (new ResultadosController)->datosDeficiencias($anio, $region);

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


        $detalles = Autoevaluacion::whereHas('asignacion', function ($query) use ($deposito, $anio) {
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



    public function deficienciasMes($anio, $region, $mes)
    {
        $region = Zona::find($region);
        $deficiencias = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->join('controles', 'controles.id', 'detalleautoevaluaciones.control_id')
            ->join('areas', 'areas.id', 'controles.area_id')
            ->selectRaw('depositos.nombre as deposito, areas.nombre, TRUNCATE(SUM(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else 0 end)/(SUM(case detalleautoevaluaciones.calificacion when "Riesgo bajo" then 1 else 0 end)+SUM(case detalleautoevaluaciones.calificacion when "Riesgo bajo con observación" then 1 else 0 end)+SUM(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else 0 end)+SUM(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else 0 end))*(100), 2) as total')
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->where('depositos.zona_id', $region->id)
            ->where('asignaciones.anio', $anio)
            ->where('asignaciones.mes', $mes)
            ->groupByRaw('depositos.nombre, areas.nombre')
            ->get();
        //dd($deficiencias);

        return view('adm.datos.deficienciasMes', compact('region', 'deficiencias', 'mes', 'anio'));
    }

    public function deficienciasDepot($anio, $mes, $deposito)
    {


        $asignacion = Asignacion::whereHas('autoevaluaciones', function ($query) use ($deposito, $anio) {
            return $query->where('deposito_id', $deposito)->where('estatus', 1);
        })->where('anio', $anio)->where('mes', $mes)->first();

        $autoevaluacion = Autoevaluacion::where('deposito_id', $deposito)->where('asignacion_id', $asignacion->id)->first();

        $detalles = DetalleAutoevaluacion::whereHas('autoevaluacion', function ($query) use ($autoevaluacion) {
            return $query->where('autoevaluacion_id', $autoevaluacion->id);
        })->where('calificacion', 'Riesgo alto')->get();


        $coleccion[] = null;

        foreach ($detalles as $i => $detalle) {
            $coleccion[$i] = $detalle->control_id;
        }

        $deficiencias = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->join('controles', 'controles.id', 'detalleautoevaluaciones.control_id')
            ->join('areas', 'areas.id', 'controles.area_id')
            ->select('detalleautoevaluaciones.*')
            ->where('asignaciones.anio', '<=', $anio)
            ->where('asignaciones.anio', '>=', ($anio - 1))
            ->where('autoevaluaciones.estatus', 1)
            ->where('autoevaluaciones.deposito_id', $deposito)
            ->whereIn('detalleautoevaluaciones.control_id', $coleccion)
            ->orderBy('detalleautoevaluaciones.control_id', 'desc')
            ->orderBy('asignaciones.anio', 'desc')
            ->orderBy('asignaciones.mes', 'desc')
            ->get();


        return view('adm.datos.deficienciasDepot', compact('deficiencias', 'autoevaluacion'));
    }


    public function detalleAutoevalucion($id)
    {
        return $detalle = DetalleAutoevaluacion::find($id);
    }



    public function graficasRegion($id, $region)
    {
        //dd($id);
        $asignacion = Asignacion::where('estatus', 1)->where('id', $id)->firstOrFail();
        $region = Zona::findOrFail($region);
        $depositos = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('zonas', 'zonas.id', 'depositos.zona_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->selectRaw('depositos.nombre, depositos.id,
        count(case detalleautoevaluaciones.calificacion when "Riesgo bajo" then 1 else null end)*100/count(*) as rb,
        count(case detalleautoevaluaciones.calificacion when "Riesgo bajo con observación" then 1 else null end)*100/count(*) as rbo,
        count(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else null end)*100/count(*) as ra')
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->where('asignaciones.id', $id)
            ->where('zonas.id', $region->id)
            ->groupByRaw('depositos.nombre, depositos.id')
            ->get();
        return view('adm.datos.resultadosRegion', compact('depositos', 'asignacion', 'region'));
    }


    public function topMes($id)
    {
        $depositos = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('zonas', 'zonas.id', 'depositos.zona_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->selectRaw('zonas.id as ID, zonas.nombre as region, depositos.nombre, depositos.id,
            count(case detalleautoevaluaciones.calificacion when "Riesgo bajo" then 1 else null end)*100/count(*) as rb,
            count(case detalleautoevaluaciones.calificacion when "Riesgo bajo con observación" then 1 else null end)*100/count(*) as rbo,
            count(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else null end)*100/count(*) as ra')
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->where('asignaciones.id', $id)
            ->groupByRaw('zonas.id, zonas.nombre, depositos.nombre, depositos.id')
            ->get();
            //dd($depositos);
           // $ordenados = $depositos->where('ID', 1)->sortByDesc('rb')->take(5);
            dd($ordenados);
    }

    public function topAnio($anio)
    {
    }
}
