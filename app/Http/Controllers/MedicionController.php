<?php

namespace App\Http\Controllers;

use App\Medicion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicionController extends Controller
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
        $mediciones = Medicion::all();
        return view('mediciones.index',['mediciones'=>$mediciones]);
    }
    public function indexPaciente()
    {
        $mediciones = Medicion::where('paciente_id', Auth::user()->id)->get();
        return view('mediciones.indexPaciente',['mediciones'=>$mediciones]);


    }
    public function indexNutricionista()
    {
        $mediciones = Medicion::where('nutricionista_id', Auth::user()->id)->get();
        return view('mediciones.index',['mediciones'=>$mediciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $users=User::all()->where('userType','=','paciente')->pluck('name','id');
        return view('mediciones.create', ['users'=>$users]);

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
            'fecha' => 'required|date|',
            'paciente_id' => ['required'],


        ]);

        $medicion = new Medicion($request->all());

        $medicion->save();


        flash('Medicion creada correctamente');


        return redirect()->route('mediciones.index');

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
        $medicion = Medicion::find($id);
        $users=User::all()->where('userType','=','paciente')->pluck('name','id');

        return view('mediciones/edit',['medicion'=>$medicion, 'users'=>$users]);
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
            'fecha' => 'required|date|',
            'paciente_id' => ['required'],


        ]);

        $medicion = Medicion::find($id);
        $medicion->fill($request->all());

        $medicion->save();

        flash('Medicion modificada correctamente');

        return redirect()->route('mediciones.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $medicion = Medicion::find($id);
        $medicion->delete();
        flash('Medicion borrada correctamente');

        return redirect()->route('mediciones.index');
    }

    public function destroyAll()
    {
        //
    }



}
