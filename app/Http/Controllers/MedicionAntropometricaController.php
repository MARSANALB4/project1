<?php

namespace App\Http\Controllers;

use App\Medicion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicionAntropometricaController extends Controller
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
        $mediciones = Medicion::all()->where('TipoMedicion','=','antropometrica');

        return view('antropometricas.index',['mediciones'=>$mediciones]);
    }
    public function indexPaciente()
    {
        $mediciones = Medicion::where('paciente_id', Auth::user()->id)->get()->where('TipoMedicion','=','antropometrica');
        return view('antropometricas.indexPaciente',['mediciones'=>$mediciones]);


    }
    public function indexNutricionista()
    {
        $mediciones = Medicion::where('nutricionista_id', Auth::user()->id)->get()->where('TipoMedicion','=','antropometrica');
        return view('antropometricas.index',['mediciones'=>$mediciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $users=User::all()->where('userType','=','paciente')->pluck('name','id');
        return view('antropometricas.create', ['users'=>$users]);

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
            'peso'=> ['required'],
            'altura'=> ['required'],
            'perímetroCadera'=> ['required'],
            'perimetroCintura'=> ['required'],
            'perimetroCuello' => ['required']

        ]);

        $medicion = new Medicion($request->all());
        $medicion->TipoMedicion= 'antropometrica';
        $medicion->peso = $request->input('peso');
        $medicion->altura  = $request->input('altura');
        $medicion->imc  = $medicion->peso/(($medicion->altura/100) * ($medicion->altura/100));
        $medicion->save();


        flash('Medicion antropometrica creada correctamente');

        return redirect()->route('antropometricas.index');

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

        return view('antropometricas/edit',['medicion'=>$medicion, 'users'=>$users]);
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
            'peso'=> ['required'],
            'altura'=> ['required'],
            'perímetroCadera'=> ['required'],
            'perimetroCintura'=> ['required'],
            'perimetroCuello' => ['required']

        ]);

        $medicion = Medicion::find($id);
        $medicion->fill($request->all());

        $medicion->save();

        flash('Medicion antropometrica modificada correctamente');

        return redirect()->route('antropometricas.index');
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
        flash('Medicion antropometrica borrada correctamente');

        return redirect()->route('antropometricas.index');
    }

    public function destroyAll()
    {
        //
    }

}
