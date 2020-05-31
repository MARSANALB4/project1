@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Platos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'platos.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear plato', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}



                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Plato</th>
                                <th>Alimento</th>

                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Calorías</th>

                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($platos as $plato)
                            <tr>
                                <td>{{ $plato->name }}</td>
                                <td>{{ $plato->alimentos->name}}</td>

                                <td>{{ $plato->cantidad }}</td>
                                <td>{{ $plato->unidad }}</td>
                                <td>{{ $plato->calorias }}</td>


                                <td>
                                    {!! Form::open(['route' => ['platos.edit',$plato->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['platos.destroy',$plato->id], 'method' => 'delete']) !!}
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
