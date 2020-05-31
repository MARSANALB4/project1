@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Comidas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'comidas.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear comida', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}



                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Comida</th>
                                <th>Momento del dia</th>
                                <th>Plato</th>
                                <th>Calorías</th>

                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($comidas as $comida)
                            <tr>
                                <td>{{ $comida->name }}</td>
                                <td>{{ $comida->TipoComida }}</td>
                                <td>{{ $comida->platos->name }}</td>
                                <td>{{ $comida->calorias}}</td>


                                <td>
                                    {!! Form::open(['route' => ['comidas.edit',$comida->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['comidas.destroy',$comida->id], 'method' => 'delete']) !!}
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
