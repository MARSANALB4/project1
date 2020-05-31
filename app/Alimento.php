<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $fillable = ['name'];


    public function platos()
    {
        return $this->hasMany('App\Plato');
    }

}
