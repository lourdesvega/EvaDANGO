<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsable extends Model
{
    use SoftDeletes;

    protected $table = 'responsables';

    protected $dates = ['deleted_at'];

    protected $attributes = [
        'activo' => 1
    ];

    protected $fillable = ['nombre', 'apellidos', 'activo', 'deposito_id'];


    public function deposito()
    {
        return $this->belongsTo('App\Deposito');
    }

    public function detalleAutoevaluaciones()
    {
        return $this->hasMany('App\DetalleAutoevaluacion');
    }
}
