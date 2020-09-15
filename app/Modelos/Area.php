<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'nombre_area', 'estado_area',
    ];

    public function user(){
        return $this->hasMany('App\User');
    }
}
