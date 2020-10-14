<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Deposito extends Model
{
    use SoftDeletes; 

    protected $table = 'depositos';

    protected $dates = ['deleted_at'];

    protected $attributes = [
        'activo' => 1
    ];

    protected $fillable = ['estado', 'municipio', 'nombre', 'activo', 'zona_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function zona()
    {
        return $this->belongsTo('App\Zona');
    }

    public function autoevaluaciones()
    {
        return $this->hasMany('App\Autoevaluacion');
    }
    
    public function responsables()
    {
        return $this->hasMany('App\Responsable');
    }
}
