<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignacion extends Model
{
    use SoftDeletes;

    protected $table = 'asignaciones';

    protected $dates = ['deleted_at', 'fechaEntrega'];

    protected $attributes = [
        'activo' => 1,
        'estatus' => 0,
        'completado' => 0,
    ];

    protected $fillable = ['fechaEntrega', 'nota', 'mes', 'anio', 'activo', 'total', 'completado'];

    public function autoevaluaciones()
    {
        return $this->hasMany('App\Autoevaluacion');
    }


    public function detallesAutoevaluacion()
    {
        return $this->hasManyThrough(
            'App\DetalleAutoevaluacion',
            'App\Autoevaluacion',
            'asignacion_id', 
            'autoevaluacion_id', 
            'id', 
            'id',
        );
    }
}
