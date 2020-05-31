@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Alimentos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'alimentos.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear alimento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}



                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Alimento</th>

                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($alimentos as $alimento)
                            <tr>
                                <td>{{ $alimento->name }}</td>
                                <td>
                                    {!! Form::open(['route' => ['alimentos.edit',$alimento->id], 'method' => 'get']) !!}
                                    {!! Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['alimentos.destroy',$alimento->id], 'method' => 'delete']) !!}
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
