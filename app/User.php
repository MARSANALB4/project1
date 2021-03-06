<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'dni', 'edad', 'sexo','telefono', 'domicilio', 'actividad',
        'especialidad_id','userType'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }
    public function objetivos()
    {
        return $this->hasMany('App\Objetivo');
    }
    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad', 'especialidad_id');
    }

     public function getFullNameAttribute()
    {
        return $this->name .' '.$this->surname;
    }

    public function plans()
    {
        return $this->hasMany('App\Plan');
    }

    public function mediciones()
    {
        return $this->hasMany('App\Medicion');
    }
}
