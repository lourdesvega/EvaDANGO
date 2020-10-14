<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Area extends Model
{ 
    use SoftDeletes; 

    public $table = 'areas';

    protected $dates = ['deleted_at'];

    protected $attributes = [
        'activo' => 1
    ];

    protected $fillable = ['nombre', 'macro', 'abreviacion', 'descripcion', 'activo'];

    public function controles()
    {
        return $this->hasMany('App\Control');
    }
}

