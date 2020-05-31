@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis Objetivos</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Peso Objetivo</th>
                                <th>IMC Objetivo</th>

                            </tr>

                            @foreach ($objetivos as $objetivo)


                                <tr>
                                    <td>{{ $objetivo->fecha_inicio }}</td>
                                    <td>{{ $objetivo->fecha_fin}}</td>
                                    <td>{{ $objetivo->peso }}</td>
                                    <td>{{ $objetivo->imc }}</td>
                                    <td>

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

