@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis Mediciones Analíticas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>HDL (mg/dL)</th>
                                <th>LDL (mg/dL)</th>
                                <th>Trigliceridos (mg/dL)</th>
                                <th>Colesterol (mg/dL)</th>
                                <th>Presion Arterial Diastolica (mmHg)</th>
                                <th>Presion Arterial Sistolica (mmHg)</th>
                            </tr>
                            @foreach ($mediciones as $medicion)
                                <tr>
                                    <td>{{ $medicion->fecha }}</td>
                                    <td>{{ $medicion->hdl}}</td>
                                    <td>{{ $medicion->ldl}}</td>
                                    <td>{{ $medicion->trigliceridos}}</td>
                                    <td>{{ $medicion->colesterol}}</td>
                                    <td>{{ $medicion->pADiastolica}}</td>
                                    <td>{{ $medicion->pASistolica}}</td>



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

