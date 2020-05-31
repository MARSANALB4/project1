<?php

namespace App\Http\Controllers;

use App\Alimento;
use App\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
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
        $platos = Plato::all();
        return view('platos.index',['platos'=>$platos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $alimentos=Alimento::all()->pluck('name','id');
        return view('platos.create', ['alimentos'=>$alimentos]);

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
            'cantidad' => ['required', 'string', 'max:255'],
            'unidad' => ['required', 'string', 'in:rebanada,racion,unidad,taza,gramos,mililitros'],
            'calorias' => ['required', 'Integer'],
            'alimento_id' => ['required']
        ]);

        $plato = new Plato($request->all());
        $alimento_id= $plato->alimento_id;

        $alimento= Alimento::find($alimento_id);
        $plato->name=$alimento->name. ' '.$plato->cantidad.' '.$plato->unidad;
        $plato->save();


        flash('Plato creado correctamente');

        return redirect()->route('platos.index');

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
        $plato = Plato::find($id);
        $alimentos=Alimento::all()->pluck('name','id');


        return view('platos/edit',['plato'=>$plato, 'alimentos'=>$alimentos]);
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
            'cantidad' => ['required', 'string', 'max:255'],
            'unidad' => ['required', 'string', 'in:rebanada,racion,unidad,taza,gramos,mililitros'],
            'calorias' => ['required', 'Integer'],
            'alimento_id' => ['required']

        ]);

        $plato = Plato::find($id);
        $plato->fill($request->all());

        $plato->save();

        flash('Plato modificado correctamente');

        return redirect()->route('platos.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $plato = Plato::find($id);
        $plato->delete();
        flash('Plato borrado correctamente');

        return redirect()->route('platos.index');
    }

    public function destroyAll()
    {
        Plato::truncate();
        flash('Todos los platos borrados correctamente');

        return redirect()->route('platos.index');
    }





}

