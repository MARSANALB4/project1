<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Especialidad extends  Model
{
    protected $fillable = ['name'];


    public function nutricionistaUser()
    {
        return $this->hasMany('App\User');
    }

}
