<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ckeditor extends Model {

    //Establecemoslatablaasociadaalmodelo
    protected $table = 'ckeditor';
 
    public function curriculumde() {
        //Este método devuelve el objeto Usuario que ha creado el mensaje
        return $this->belongsTo('App\User', 'id');
    }
    

}
