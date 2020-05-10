<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Especialidad extends  Model
{
    protected $fillable = ['name'];

    public function nutricionistas()
    {
        return $this->hasMany('App\Nutricionista');
    }

}
