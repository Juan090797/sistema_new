<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre_empr', 'estado_empr',
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}
