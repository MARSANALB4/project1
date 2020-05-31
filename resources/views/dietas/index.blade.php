@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dietas Diarias</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'dietas.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear Dieta Diaria', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}



                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Comida</th>
                                <th>Día de la semana</th>


                                <th>Calorias</th>
                                <th>Plan</th>


                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($dietas as $dieta)
                            <tr>
                                <td>{{ $dieta->comidas->name}}</td>
                                <td>{{ $dieta->semanal}}</td>
                                <td>{{ $dieta->calorias}}</td>
                                <td>{{ $dieta->plans->name}}</td>



                                <td>
                                    {!! Form::open(['route' => ['dietas.edit',$dieta->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['dietas.destroy',$dieta->id], 'method' => 'delete']) !!}
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
