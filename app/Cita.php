<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fecha_hora', 'nutricionista_id', 'paciente_id', 'localizacion'];


    public function nutricionistaUser()
    {
        return $this->belongsTo('App\User', 'nutricionista_id');
    }

    public function pacienteUser()
    {
        return $this->belongsTo('App\User', 'paciente_id');
    }
}
