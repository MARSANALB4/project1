<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    protected $fillable = ['TipoComida', 'plato_id', 'calorias', 'name'];

    public function platos()
    {
        return $this->belongsTo('App\Plato', 'plato_id');
    }

    public function dietas()
    {
        return $this->hasMany('App\Dieta');
    }


}
