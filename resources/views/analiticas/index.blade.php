@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mediciones Analíticas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'analiticas.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear medicion analitica', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}


                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Paciente</th>
                                <th>HDL (mg/dL)</th>
                                <th>LDL (mg/dL)</th>
                                <th>Trigliceridos (mg/dL)</th>
                                <th>Colesterol (mg/dL)</th>
                                <th>Presion Arterial Diastolica (mmHg)</th>
                                <th>Presion Arterial Sistolica (mmHg)</th>

                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($mediciones as $medicion)
                            <tr>
                                <td>{{ $medicion->fecha }}</td>
                                <td>{{ $medicion->pacienteUser->fullName}}</td>
                                <td>{{ $medicion->hdl}}</td>
                                <td>{{ $medicion->ldl}}</td>
                                <td>{{ $medicion->trigliceridos}}</td>
                                <td>{{ $medicion->colesterol}}</td>
                                <td>{{ $medicion->pADiastolica}}</td>
                                <td>{{ $medicion->pASistolica}}</td>




                                <td>
                                    {!! Form::open(['route' => ['analiticas.edit',$medicion->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['analiticas.destroy',$medicion->id], 'method' => 'delete']) !!}
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
