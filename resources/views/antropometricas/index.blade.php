@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Mediciones Antropometricas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'antropometricas.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear medicion antropometica', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}


                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Paciente</th>
                                <th>Peso (kg)</th>
                                <th>Altura (cm)</th>
                                <th>IMC</th>

                                <th>perímetro Cadera (cm)</th>
                                <th>perímetro Cintura (cm)</th>
                                <th>perímetro Cuello (cm)</th>
                                <th>Pliegue Cutáneo Adominal (mm)</th>
                                <th>Pliegue Cutáneo Axilar Medio (mm)</th>
                                <th>Pliegue Cutáneo Pectoral (mm)</th>
                                <th>Pliegue Cutáneo Subescapular (mm)</th>
                                <th>Pliegue Cutáneo Suprailiaco (mm)</th>
                                <th>Pliegue Cutáneo Tricipital (mm)</th>
                                <th>Pliegue Cutáneo Muslo (mm)</th>

                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($mediciones as $medicion)
                            <tr>
                                <td>{{ $medicion->fecha }}</td>
                                <td>{{ $medicion->pacienteUser->fullName}}</td>
                                <td>{{ $medicion->peso }}</td>
                                <td>{{ $medicion->altura }}</td>
                                <td>{{ $medicion->imc}}</td>

                                <td>{{ $medicion->perímetroCadera}}</td>
                                <td>{{ $medicion->perímetroCintura}}</td>
                                <td>{{ $medicion->perimetroCuello}}</td>
                                <td>{{ $medicion->pcAdominal}}</td>

                                <td>{{ $medicion->pcAxilarMedio}}</td>
                                <td>{{ $medicion->pcPectoral}}</td>
                                <td>{{ $medicion->pcSubescapular}}</td>
                                <td>{{ $medicion->pcSuprailiaco}}</td>
                                <td>{{ $medicion->pcTricipital}}</td>
                                <td>{{ $medicion->pcMuslo}}</td>


                                <td>
                                    {!! Form::open(['route' => ['antropometricas.edit',$medicion->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['antropometricas.destroy',$medicion->id], 'method' => 'delete']) !!}
                                    {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
