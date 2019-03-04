<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','surname2','telefono', 'email', 'password','image_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function mensajes() 
    {
        return $this->hasMany('App\Mensajes','id_destinatario');
    }
    public function logs() 
    {
        return $this->hasMany('App\Logs','id_hechopor');
    }
     public function ckeditor() 
    {
        return $this->hasMany('App\Ckeditor','id');
    }
   
}
