@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Planes</div>

                    <div class="panel-body">
                        @include('flash::message')



                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

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
                                <th>Total calorias</th>


                            </tr>
                            @foreach ($plans as $plan)
                                <tr>

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
                                    <td>{{ $plan->calorias}}</td>



                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
