@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Objetivos</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Nutricionista</th>
                                <th>Paciente</th>
                                <th>Localizacion</th>

                                <th colspan="2">Acciones</th>
                            </tr>


                            @foreach ($citas as $cita)


                                <tr>
                                    <td>{{ $cita->fecha_hora }}</td>
                                    <td>{{ $cita->nutricionista_id}}</td>

                                    <td>{{ $cita->paciente_id}}</td>

                                    <td>{{ $cita->localizacion }}</td>



                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

