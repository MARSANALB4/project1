<?php


namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Objetivo  extends  Model
{
    protected $fillable = ['peso', 'imc','paciente_id'];


    public function pacienteUser()
    {
        return $this->belongsTo('App\User', 'paciente_id');
    }
}
