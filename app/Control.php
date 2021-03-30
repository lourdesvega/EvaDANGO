<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Control extends Model
{
    use SoftDeletes; 

    protected $table = 'controles';

    protected $dates = ['deleted_at'];

    protected $attributes = [
        'activo' => 1
    ];

    protected $fillable = ['referencial', 'riesgosDominio', 'riesgosClave', 'objetivo', 'guia', 'activo', 'area_id'];

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function detalleAutoevaluaciones()
    {
        return $this->hasMany('App\DetalleAutoevaluacion');
    }
}
