<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Nutricionista;
use App\Paciente;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
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
        $citas = Cita::all();

        return view('citas/index',['citas'=>$citas]);
    }

    public function indexPaciente(){
        $citas = Cita::where('paciente_id', Auth::user()->id)->get();
        return view('citas.indexPaciente',['citas'=>$citas]);
    }

    public function indexNutricionista()
    {
        $citas = Cita::all();

        return view('citas/index',['citas'=>$citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $pacientes=User::all()->where('userType','=','paciente')->pluck('name','id');
        $nutricionistas=User::all()->where('userType','=','nutricionista')->pluck('name','id');

        return view('citas.create', ['pacientes'=>$pacientes, 'nutricionistas'=>$nutricionistas ]);

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
            'nutricionista_id' => 'required|exists:users,id',
            'paciente_id' => 'required|exists:users,id',
            'fecha_hora' => 'required|date|after:now',
            'localizacion' => 'required|max:255'

        ]);
        $nutricionista_id = Auth::user()->id;

        $cita = new Cita($request->all());
        $cita->nutricionista_id = $nutricionista_id;

        $cita->save();

        flash('Cita creada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $cita = Cita::find($id);

        return view('citas/show',['cita'=>$cita]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $cita = Cita::find($id);
        $pacientes=User::all()->where('userType','=','paciente')->pluck('name','id');
        $nutricionistas=User::all()->where('userType','=','nutricionista')->pluck('name','id');



        return view('citas/edit',['cita'=> $cita,'pacientes'=>$pacientes, 'nutricionistas'=>$nutricionistas]);
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
            'nutricionista_id' => 'required|exists:users,id',
            'paciente_id' => 'required|exists:users,id',
            'fecha_hora' => 'required|date|after:now',
            'localizacion' => 'required|max:255',

        ]);
        $cita = Cita::find($id);
        $cita->fill($request->all());

        $cita->save();

        flash('Cita modificada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
}
