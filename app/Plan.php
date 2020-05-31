<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Plan extends  Model
{
    protected $fillable = ['fecha_inicio', 'fecha_fin', 'calorias', 'dieta_id', 'paciente_id', 'nutricionista_id'];


    public function pacienteUser()
    {
        return $this->belongsTo('App\User', 'paciente_id');
    }
    public function nutricionistaUser()
    {
        return $this->belongsTo('App\User', 'nutricionista_id');
    }
    public function dietas()
    {
        return $this->hasMany('App\Dieta');
    }
}
