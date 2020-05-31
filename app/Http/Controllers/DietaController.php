<?php

namespace App\Http\Controllers;

use App\Comida;
use App\Dieta;
use App\Plan;
use App\Plato;
use Illuminate\Http\Request;

class DietaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //


        $dietas = Dieta::all();

        return view('dietas/index')->with('dietas', $dietas);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $comidas=Comida::all()->pluck('name','id');
        $plans=Plan::all()->pluck('name','id');

        //$comidas=Comida::all();
       //$nombretipo= $comidas->nombreTipoComida;


        return view('dietas/create',[ 'comidas'=>$comidas, 'plans'=>$plans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'semanal' => ['required', 'string', 'in:lunes,martes,miercoles,jueves,viernes,sabado,domingo'],
            'comida_id' => ['required'],
            'plan_id' => ['required']

        ]);

        $dieta = new Dieta($request->all());

        $comida_id= $dieta->comida_id;
        $comida= Comida::find($comida_id);
        $dieta->calorias=$comida->calorias;
        $dieta->name=$comida->name;


        //obtener suma de todas las calorias de las comidas que hay en la dieta:





        $dieta->save();


        flash('Dieta creada correctamente');

        return redirect()->route('dietas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $dieta = Dieta::find($id);
        //$comidas=Comida::all()->pluck('comida','id');
        $comidas=Comida::all()->pluck('name','id');
        $plans=Plan::all()->pluck('name','id');

        return view('dietas/edit', ['dieta'=>$dieta, 'comidas'=>$comidas,'plans'=>$plans ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'semanal' => ['required', 'string', 'in:lunes,martes,miercoles,jueves,viernes,sabado,domingo'],
            'comida_id' => ['required'],
            'plan_id' => ['required']
        ]);

        $dieta = Dieta::find($id);
        $dieta->fill($request->all());

        $dieta->save();

        flash('Dieta modificada correctamente');

        return redirect()->route('dietas.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dieta = Dieta::find($id);
        $dieta->delete();
        flash('Dieta borrada correctamente');

        return redirect()->route('dietas.index');
    }


    public function lunes($plan_id)
    {
        //filtrar dietas del lunes:
        $plans=Plan::all()->where('p')->pluck('name','id');

        $dieta = Dieta::all()->where('semanal','=','lunes');

        return view('dietas.lunes', ['dieta'=>$dieta, 'plans'=>$plans]);

    }
    public function martes($id)
    {
        $plans=Plan::all()->where('$dieta->plan_id','=', 'plan_id')->pluck('name','id');

        $dieta = Dieta::all()->where('semanal','=','martes');

        return view('dietas.martes', ['dieta'=>$dieta, 'plans'=>$plans]);

    }
    public function miercoles($id)
    {
        $dieta = Dieta::all()->where('semanal','=','miercoles');
        $plans=Plan::all()->pluck('name','id');

        return view('dietas.miercoles', ['dieta'=>$dieta, 'plans'=>$plans]);
    }

    public function jueves($id)
    {
        $dieta = Dieta::all()->where('semanal','=','jueves');
        $plans=Plan::all()->pluck('name','id');

        return view('dietas.jueves', ['dieta'=>$dieta, 'plans'=>$plans]);
    }
    public function viernes($id)
    {
        $dieta = Dieta::all()->where('semanal','=','viernes');
        $plans=Plan::all()->pluck('name','id');

        return view('dietas.viernes', ['dieta'=>$dieta, 'plans'=>$plans]);
    }
    public function sabado($id)
    {
        $dieta = Dieta::all()->where('semanal','=','sabado');
        $plans=Plan::all()->pluck('name','id');

        return view('dietas.sabado', ['dieta'=>$dieta, 'plans'=>$plans]);
    }
    public function domingo($id)
    {
        $dieta = Dieta::all()->where('semanal','=','domingo');
        $plans=Plan::all()->pluck('name','id');

        return view('dietas.domingo', ['dieta'=>$dieta, 'plans'=>$plans]);
    }
}
