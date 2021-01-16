<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignacion;
use App\Zona;
use Illuminate\Support\Facades\DB;

class DatosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function region($id)
    {
        $calificaciones = DB::table('zonas')
            ->join('depositos', 'zonas.id', 'depositos.zona_id')
            ->join('autoevaluaciones', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->selectRaw('zonas.nombre, count(*) as total, 
            count(case detalleautoevaluaciones.calificacion when "Riesgo bajo" then 1 else null end)*100/count(*) as rb,
            count(case detalleautoevaluaciones.calificacion when "Riesgo bajo con observación" then 1 else null end)*100/count(*) as rbo,
            count(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else null end)*100/count(*) as ra')
            ->where('autoevaluaciones.asignacion_id', $id)
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->groupByRaw('zonas.nombre')
            
            ->get();



        return $calificaciones;
    }

    public function nacional($datos)
    {
        $region = [];
        $total = 0;
        $rb = 0;
        $rbo = 0;
        $ra = 0;

        foreach ($datos as $dato) {
            $total = $total + $dato->total;
            $rb = $rb + $dato->rb;
            $rbo = $rbo + $dato->rbo;
            $ra = $ra + $dato->ra;
        }

        $region[0] = [
            'rb' => ($rb * 100) / $total,
            'rbo' => ($rbo * 100) / $total,
            'ra' => ($ra * 100) / $total,
        ];

        return $region;
    }

    public function riesgoAlto($datos)
    {
        $riesgos = [];
        foreach ($datos as $i => $dato) {
            $riesgos[$i] = $dato->ra / $dato->total * 100;
        }
        return $riesgos;
    }

    public function datos($id)
    {
        $calificaciones = DB::table('zonas')
            ->join('depositos', 'zonas.id', 'depositos.zona_id')
            ->join('autoevaluaciones', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->selectRaw('zonas.nombre, count(*) as total, 
            count(case detalleautoevaluaciones.calificacion when "Riesgo bajo" then 1 else null end) as rb,
            count(case detalleautoevaluaciones.calificacion when "Riesgo bajo con observación" then 1 else null end) as rbo,
            count(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else null end) as ra')
            ->where('autoevaluaciones.asignacion_id', $id)
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->groupByRaw('zonas.nombre')
            ->get();
        return $calificaciones;
    }



    public function regionAnio($anio)
    {

        $riesgosRegion = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('zonas', 'zonas.id', 'depositos.zona_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->selectRaw('zonas.nombre, asignaciones.mes, count(*) as total, TRUNCATE(count(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else null end)/count(*)*100, 2) as ra')
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->where('asignaciones.anio', $anio)
            ->groupByRaw('zonas.nombre, asignaciones.mes')
            ->orderBy('zonas.nombre', 'asc')
            ->orderBy('asignaciones.mes', 'asc')
            ->get();

        return $riesgosRegion;
    }

    public function nacionalAnio($anio)
    {
        $riesgosNacional = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('zonas', 'zonas.id', 'depositos.zona_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->selectRaw('"Nacional" as nombre, asignaciones.mes, count(*) as total, TRUNCATE(count(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else null end)/count(*)*100, 2) as ra')
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->where('asignaciones.anio', $anio)
            ->groupByRaw(' asignaciones.mes')
            ->orderBy('asignaciones.mes', 'asc')
            ->get();

        return $riesgosNacional;
    }


    public function deficienciasRegion($anio, $region)
    {
        $deficiencias = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->join('controles', 'controles.id', 'detalleautoevaluaciones.control_id')
            ->join('areas', 'areas.id', 'controles.area_id')
            ->selectRaw('areas.nombre, asignaciones.mes , TRUNCATE(SUM(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else 0 end)/(SUM(case detalleautoevaluaciones.calificacion when "Riesgo bajo con observación" then 1 else 0 end)+SUM(case detalleautoevaluaciones.calificacion when "Riesgo bajo" then 1 else 0 end)+SUM(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else 0 end))*(100), 2) as total')
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->where('depositos.zona_id', $region)
            ->where('asignaciones.anio', $anio)
            ->groupByRaw(' asignaciones.mes, areas.nombre')
            ->orderBy('asignaciones.mes', 'asc')
            ->get();

        return $deficiencias;
    }

    public function deficienciasNacional($anio)
    {
        $deficiencias = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->join('controles', 'controles.id', 'detalleautoevaluaciones.control_id')
            ->join('areas', 'areas.id', 'controles.area_id')
            ->selectRaw('areas.nombre, asignaciones.mes , TRUNCATE(SUM(case detalleautoevaluaciones.calificacion when "Riesgo alto" then 1 else 0 end)/(SUM(case detalleautoevaluaciones.calificacion when "Riesgo bajo con observación" then 1 else 0 end)+SUM(case detalleautoevaluaciones.calificacion when "Riesgo bajo" then 1 else 0 end))*100 , 2) as total')
            ->where('detalleautoevaluaciones.calificacion', '<>', '')
            ->where('asignaciones.anio', $anio)
            ->groupByRaw(' asignaciones.mes, areas.nombre')
            ->orderBy('asignaciones.mes', 'asc')
            ->get();


        return $deficiencias;
    }

    public function mesesDeficiencias($anio)
    {
    }
}
