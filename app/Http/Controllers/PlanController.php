<?php

namespace App\Http\Controllers;

use App\Comida;
use App\Dieta;
use App\Plan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
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


        $plans= Plan::all();

        return view('plans/index')->with('plans', $plans);


    }

    public function indexPaciente()
    {
        $plans = Plan::where('paciente_id', Auth::user()->id)->get();
        return view('plans.indexPaciente',['plans'=>$plans]);



    }
    public function indexNutricionista()
    {
        $plans = Plan::where('nutricionista_id', Auth::user()->id)->get();
        return view('plans.index',['plans'=>$plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $dietas=Dieta::all()->pluck('name','id');

        $pacientes=User::all()->where('userType','=','paciente')->pluck('name','id');
        $nutricionistas=User::all()->where('userType','=','nutricionista')->pluck('name','id');


        return view('plans/create',['dietas'=>$dietas, 'pacientes'=>$pacientes, 'nutricionistas'=>$nutricionistas]);
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
            'fecha_inicio' => 'required|date|',
            'fecha_fin' => 'required|date|after:now',
            'paciente_id' => 'required|exists:users,id',
            'nutricionista_id' => 'required|exists:users,id'


        ]);

        $plan = new Plan($request->all());

        $nutricionista_id = Auth::user()->id;

        $plan->nutricionista_id = $nutricionista_id;
        $plan->calorias=11;//editar
        //nombre del plan es el id del plan + el nombre del paciente
        $paciente_id= $plan->paciente_id;
        $paciente= User::find($paciente_id);
        $plan->name='Plan de: '.$paciente->name.' '.$paciente->surname;


        $plan->save();

        flash('Plan creado correctamente');

        return redirect()->route('plans.index');
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

        $plan= Plan::find($id);
        $dietas=Dieta::all()->pluck('name','id');
        $pacientes=User::all()->where('userType','=','paciente')->pluck('name','id');
        $nutricionistas=User::all()->where('userType','=','nutricionista')->pluck('name','id');

        return view('plans/edit', ['plan'=>$plan,'dietas'=>$dietas, 'pacientes'=>$pacientes, 'nutricionistas'=>$nutricionistas ]);

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
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:now',
            'paciente_id' => 'required|exists:users,id',
            'nutricionista_id' => 'required|exists:users,id'


        ]);

        $plan= Plan::find($id);
        $plan->fill($request->all());

        $plan->save();

        flash('Plan modificado correctamente');

        return redirect()->route('plans.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $plan= Plan::find($id);
        $plan->delete();
        flash('Plan borrado correctamente');

        return redirect()->route('plans.index');
    }


}
