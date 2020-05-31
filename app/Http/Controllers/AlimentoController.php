<?php

namespace App\Http\Controllers;

use App\Alimento;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    /**
     * AlimentoController constructor.
     */
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
        $alimentos = Alimento::all();
        return view('alimentos.index',['alimentos'=>$alimentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        return view('alimentos.create');

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
            'name' => ['required', 'string', 'max:255']
        ]);

        $alimento = new Alimento($request->all());
        $alimento->save();


        flash('Alimento creado correctamente');

        return redirect()->route('alimentos.index');

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
        $alimento = Alimento::find($id);

        return view('alimentos/edit',['alimento'=>$alimento]);
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
            'name' => ['required', 'string', 'max:255']

        ]);

        $alimento = Alimento::find($id);
        $alimento->fill($request->all());

        $alimento->save();

        flash('Alimento modificado correctamente');

        return redirect()->route('alimentos.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $alimento = Alimento::find($id);
        $alimento->delete();
        flash('Alimento borrado correctamente');

        return redirect()->route('alimentos.index');
    }

    public function destroyAll()
    {
        Alimento::truncate();
        flash('Todos los alimentos borrados correctamente');

        return redirect()->route('alimentos.index');
    }





}
