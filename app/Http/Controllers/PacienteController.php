<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PacienteController extends Controller
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

        $pacientes= User::all()->where('userType','=','paciente');


        return view('pacientes/index',['pacientes'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {


        return view('pacientes/create');

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
            'dni' => 'required|max:255',
            'edad' => 'required|date',
            'sexo' => ['required', 'string', 'in:mujer,hombre'],
            'telefono' => 'required|max:255',
            'domicilio' => 'required|max:255',
            'actividad' => ['required', 'string', 'in:sedentario,pocoActivo,medianamenteActivo,muyActivo,extraActivo']

        ]);



        flash('Paciente creado correctamente');

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $paciente= User::find($id);

        return view('pacientes/edit',['paciente'=> $paciente]);
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
            'dni' => 'required|max:255',
            'edad' => 'required|date',
            'sexo' => ['required', 'string', 'in:mujer,hombre'],
            'telefono' => 'required|max:255',
            'domicilio' => 'required|max:255',
            'actividad' => ['required', 'string', 'in:sedentario,pocoActivo,medianamenteActivo,muyActivo,extraActivo']

        ]);

        $paciente= User::find($id);
        $paciente->fill($request->all());

        $paciente->save();

        flash('Paciente modificado correctamente');

        return redirect()->route('pacientes.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $paciente= User::find($id)->where('userType','=','paciente');
        $paciente->delete();
        flash('Paciente borrado correctamente');

        return redirect()->route('pacientes.index');
    }
}
