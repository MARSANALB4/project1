<?php



namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $fillable = ['name','cantidad','unidad','calorias','alimento_id'];

    public function alimentos()
    {
        return $this->belongsTo('App\Alimento', 'alimento_id');
    }
    public function comidas()
    {
        return $this->hasMany('App\Comida');
    }

    public function dietas()
    {
        return $this->hasMany('App\Dieta');
    }

}
