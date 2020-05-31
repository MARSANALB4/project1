@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Objetivos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'objetivos.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear objetivos', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'objetivos.destroyAll', 'method' => 'delete', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Borrar todas', ['class'=> 'btn btn-danger','onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Peso objetivo</th>
                                <th>IMC objetivo</th>
                                <th>Paaciente</th>

                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($objetivos as $objetivo)
                            <tr>
                                <td>{{ $objetivo->fecha_inicio }}</td>
                                <td>{{ $objetivo->fecha_fin}}</td>
                                <td>{{ $objetivo->peso}}</td>
                                <td>{{ $objetivo->imc}}</td>
                                <td>{{ $objetivo->pacienteUser->fullName}}</td>

                                <td>
                                    {!! Form::open(['route' => ['objetivos.edit',$objetivo->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['objetivos.destroy',$objetivo->id], 'method' => 'delete']) !!}
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
