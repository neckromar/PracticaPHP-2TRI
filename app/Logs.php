<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Logs extends Model {

    //Establecemoslatablaasociadaalmodelo
    protected $table = 'logs';
 
    public function hechopor() {
        //Este método devuelve el objeto Usuario que ha creado el mensaje
        return $this->belongsTo('App\User', 'id_hechopor');
    }
     public function cambiado() {
        //Este método devuelve el objeto Usuario que ha creado el mensaje
        return $this->belongsTo('App\User', 'id_cambiado');
    }

}
