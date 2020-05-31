<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    protected $fillable = ['semanal', 'calorias', 'comida_id','plan_id','name'];



    public function comidas()
    {
        return $this->belongsTo('App\Comida', 'comida_id');
    }


    public function plans()
    {
        return $this->belongsTo('App\Plan', 'plan_id');
    }

}
