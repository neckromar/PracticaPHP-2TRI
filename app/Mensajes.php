<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mensajes extends Model
{

    //Establecemoslatablaasociadaalmodelo
    protected $table='mensajes';
    
    protected $fillable = [
        'id_mensaje', 'asunto','destinatario', 'autor'
    ];

    
     public function user(){
    //EstemétododevuelveelobjetoUsuarioquehacreadolaimagen
    return$this->belongsTo('App\User','id');
    }
}
