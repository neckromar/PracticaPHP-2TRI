<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mensajes extends Model {

    //Establecemoslatablaasociadaalmodelo
    protected $table = 'mensajes';
 
    public function user() {
        //Este método devuelve el objeto Usuario que ha creado el mensaje
        return$this->belongsTo('App\User', 'id_destinatario');
    }
     public function user_autor() {
        //Este método devuelve el objeto Usuario que ha creado el mensaje
        return$this->belongsTo('App\User', 'id_autor');
    }

}
