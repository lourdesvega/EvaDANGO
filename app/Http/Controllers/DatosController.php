<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignacion;
use App\Zona;
use Illuminate\Support\Facades\DB;

class DatosController extends Controller
{
    public function region($asignacion_id, $zona_id)
    {

        /*$calificaciones = DB::table('asignaciones')
            ->join('autoevaluaciones', 'asignaciones.id', 'autoevaluaciones.asignacion_id')
            ->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->join('zonas', 'zonas.id', 'depositos.zona_id')
            ->where('depositos.zona_id', $zona_id)
            ->where('asignaciones.id', $asignacion_id)
            ->groupBy('detalleautoevaluaciones.calificacion')
            ->groupBy('depositos.zona_id')
            ->select(DB::raw('count(*) as total, depositos.zona_id,'))
            ->get();
            */
        //nO HAS PUESTO EL JOIN DE ASIGNACIONES
        $calificaciones = DB::table('zonas')
            ->join('depositos', 'zonas.id', 'depositos.zona_id')
            ->join('autoevaluaciones', 'depositos.id', 'autoevaluaciones.deposito_id')

            //->join('depositos', 'depositos.id', 'autoevaluaciones.deposito_id')
            ->join('detalleautoevaluaciones', 'detalleautoevaluaciones.autoevaluacion_id', 'autoevaluaciones.id')
            ->select(DB::raw('count("detalleautoevaluciones") as total, zonas.nombre'))
            ->groupBy('zonas.nombre')
            //->distinct('detalleautoevaluciones.calificacion')
            ->where('autoevaluaciones.asignacion_id', $asignacion_id)
            ->where('detalleautoevaluaciones.calificacion', '<>', '')

            ->get();

        /*  $users = DB::table('users')
            ->joinSub($latestPosts, 'latest_posts', function ($join) {
                $join->on('users.id', '=', 'latest_posts.user_id');
            })->get();*/

        dd($calificaciones);

        // return $calificaciones;
    }
}
