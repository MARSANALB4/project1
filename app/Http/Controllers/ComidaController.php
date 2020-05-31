<?php

namespace App\Http\Controllers;

use App\Comida;
use App\Plato;

use Illuminate\Http\Request;

class ComidaController extends Controller
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
        $comidas = Comida::all();
        return view('comidas.index',['comidas'=>$comidas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $platos=Plato::all()->pluck('name','id');

        return view('comidas.create', ['platos'=>$platos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'TipoComida' => ['required', 'string', 'in:desayuno,mediaMañana,almuerzo,merienda,cena'],
            'plato_id' => ['required']
        ]);


        $comida = new Comida($request->all());

        $plato_id= $comida->plato_id;
        $plato= Plato::find($plato_id);
        $comida->name=$comida->TipoComida.': '.$plato->name;
        $comida->calorias=$plato->calorias;


        $comida->save();


        flash('Comida creada correctamente');

        return redirect()->route('comidas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $comida = Comida::find($id);
        $platos=Plato::all()->pluck('name','id');


        return view('comidas/edit',['comida'=> $comida, 'platos'=>$platos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'TipoComida' => ['required', 'string', 'in:desayuno,mediaMañana,almuerzo,merienda,cena'],
            'plato_id' => ['required']
        ]);

        $comida = Comida::find($id);
        $comida->fill($request->all());

        $comida->save();

        flash('Comida modificada correctamente');

        return redirect()->route('comidas.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $comida = Comida::find($id);
        $comida->delete();
        flash('Comida borrada correctamente');

        return redirect()->route('comidas.index');
    }

    public function destroyAll()
    {
    //
    }


    //
}
