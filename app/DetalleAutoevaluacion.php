<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class DetalleAutoevaluacion extends Model
{
    use SoftDeletes; 

    protected $table = 'detalleAutoevaluaciones';
    
    protected $fillable = ['calificacion', 'hallazgo', 'plan', 'fechaCompromiso','activo', 'estatus' ,'control_id', 'autoevaluacion_id'];

    protected $casts = [
        'fechaCompromiso' => 'date:d-m-Y',
    ];

    protected $dates = ['deleted_at'];

    protected $attributes = [
        'activo' => 1,
        'estatus' => 0,
    ];


    public function autoevaluacion()
    {
        return $this->belongsTo('App\Autoevaluacion');
    }

    public function control()
    {
        return $this->belongsTo('App\Control');
    }

    public function responsable()
    {
        return $this->belongsTo('App\Responsable');
    }

    public function evidencias()
    {
        return $this->hasMany('App\Evidencia','detalle_id');
    }


}
