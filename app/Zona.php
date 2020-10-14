<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Zona extends Model
{
    use SoftDeletes; 

    public $table = 'zonas';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre'];


    public function depositos()
    {
        return $this->has('App\Deposito');
    }
}

