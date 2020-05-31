@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Planes</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'plans.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear planes', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}



                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Plan</th>

                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Paciente</th>
                                <th>Nutricionista</th>

                                <th>L</th>
                                <th>M</th>
                                <th>X</th>
                                <th>J</th>
                                <th>V</th>
                                <th>S</th>
                                <th>D</th>


                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($plans as $plan)
                            <tr>
                                <td>{{ $plan->name}}</td>

                                <td>{{ $plan->fecha_inicio }}</td>
                                <td>{{ $plan->fecha_fin}}</td>
                                <td>{{ $plan->pacienteUser->fullName}}</td>
                                <td>{{ $plan->nutricionistaUser->fullName}}</td>



                                <td>
                                    {!! Form::open(['route' => ['dietas.lunes',$plan->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Ver dieta', ['class'=> 'btn btn-primary'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['dietas.martes',$plan->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Ver dieta', ['class'=> 'btn btn-primary'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['dietas.miercoles',$plan->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Ver dieta', ['class'=> 'btn btn-primary'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['dietas.jueves',$plan->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Ver dieta', ['class'=> 'btn btn-primary'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['dietas.viernes',$plan->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Ver dieta', ['class'=> 'btn btn-primary'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['dietas.sabado',$plan->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Ver dieta', ['class'=> 'btn btn-primary'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['dietas.domingo',$plan->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Ver dieta', ['class'=> 'btn btn-primary'])!!}
                                    {!! Form::close() !!}

                                </td>


                                <td>
                                    {!! Form::open(['route' => ['plans.edit',$plan->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['plans.destroy',$plan->id], 'method' => 'delete']) !!}
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
