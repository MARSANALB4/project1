<?php

namespace App\Http\Controllers;

use App\Providers\Objetivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjetivoController extends Controller
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
        $objetivos = Objetivo::all();
        return view('objetivos.index',['objetivos'=>$objetivos]);
    }
    public function indexPaciente()
    {
      $objetivos = Objetivo::where('paciente_id', Auth::user()->id)->get();
      return view('objetivos.indexPaciente',['objetivos'=>$objetivos]);



    }
    public function indexNutricionista()
    {
        $objetivos = Objetivo::where('nutricionista_id', Auth::user()->id)->get();
        return view('objetivos.index',['objetivos'=>$objetivos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('objetivos.create');
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
            'peso' => ['required', 'string', 'max:255'],
            'imc' => ['required', 'string', 'max:255'],
            'paciente_id' => ['required']
//requireed|exists:users,id'
        ]);

        $objetivo = new Objetivo($request->all());
        $objetivo->save();


        flash('Objetivo creado correctamente');

        return redirect()->route('objetivos.index');

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
        $objetivo = Objetivo::find($id);

        return view('objetivos/edit',['objetivo'=>$objetivo]);
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
            'peso' => ['required', 'string', 'max:255'],
            'imc' => ['required', 'string', 'max:255'],
            'paciente_id' => 'required|exists:users,id'

        ]);

        $objetivo = Objetivo::find($id);
        $objetivo->fill($request->all());

        $objetivo->save();

        flash('Objetivo modificado correctamente');

        return redirect()->route('objetivos.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $objetivo = Objetivo::find($id);
        $objetivo->delete();
        flash('Objetivo borrado correctamente');

        return redirect()->route('objetivos.index');
    }

    public function destroyAll()
    {
        Objetivo::truncate();
        flash('Todos los objetivos borrados correctamente');

        return redirect()->route('objetivos.index');
    }





}
