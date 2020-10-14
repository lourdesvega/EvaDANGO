<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{

    protected $table = 'evidencias';

    protected $fillable = ['nombre', 'formato', 'ubicacion'];

    public function detalle()
    {
        return $this->belongsTo('App\DetalleAutoevaluacion','detalle_id');
    }

}
