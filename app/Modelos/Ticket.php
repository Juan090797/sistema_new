<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use Notifiable;
    protected $table = 'tickets';

    protected $fillable = [
        'titulo_tk', 'descripcion_tk', 'estado_tk', 'categoria_id','tipo_id', 'prioridad_id', 'requester_user_id',
    ];

    public function categoria(){
        return $this->belongsTo('App\Modelos\Categoria');
    }

    public function prioridad(){
        return $this->belongsTo('App\Modelos\Prioridad');
    }

    public function user(){
        return $this->belongsTo('App\User', 'requester_user_id');
    }

    public function comentarios(){
        return $this->hasMany('App\Modelos\Comentario');
    }

}