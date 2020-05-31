<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    protected $fillable = [
        'fecha', 'paciente_id', 'TipoMedicion',

        'peso', 'altura', 'perímetroCadera', 'perimetroCintura', 'perimetroCuello','pcAdominal',
        'pcAxilarMedio', 'pcPectoral', 'pcSubescapular','pcSuprailiaco', 'pcTricipital', 'pcMuslo', 'imc',

        'hdl', 'ldl', 'colesterol', 'pADiastolica', 'pASistolica', 'trigliceridos'
    ];

    public function pacienteUser()
    {
        return $this->belongsTo('App\User', 'paciente_id');
    }





}


