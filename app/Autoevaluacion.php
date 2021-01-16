<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autoevaluacion extends Model
{
    use SoftDeletes;

    protected $table = 'autoevaluaciones';

    protected $fillable = ['id', 'fechaConclusion', 'activo', 'estatus', 'deposito_id', 'asignacion_id'];

    protected $dates = ['deleted_at'];

    protected $attributes = [
        'activo' => 1,
        'estatus' => 0,
    ];

    protected $casts = [
        'fechaConclusion' => 'date:d-m-Y',
    ];


    public function asignacion()
    {
        return $this->belongsTo('App\Asignacion');
    }

    public function deposito()
    {
        return $this->belongsTo('App\Deposito');
    }

    public function detalleAutoevaluaciones()
    {
        return $this->hasMany('App\DetalleAutoevaluacion');
    }
}
