@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis Mediciones Antropometricas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Peso (kg)</th>
                                <th>Altura (cm)</th>
                                <th>IMC</th>

                                <th>perímetro Cadera (cm)</th>
                                <th>perímetro Cintura (cm)</th>
                                <th>perímetro Cuello (cm)</th>
                                <th>Pliegue Cutáneo Adominal (mm)</th>
                                <th>Pliegue Cutáneo Axilar Medio (mm)</th>
                                <th>Pliegue Cutáneo Pectoral (mm)</th>
                                <th>Pliegue Cutáneo Subescapular (mm)</th>
                                <th>Pliegue Cutáneo Suprailiaco (mm)</th>
                                <th>Pliegue Cutáneo Tricipital (mm)</th>
                                <th>Pliegue Cutáneo Muslo (mm)</th>


                            </tr>
                            @foreach ($mediciones as $medicion)
                                <tr>
                                    <td>{{ $medicion->fecha }}</td>
                                    <td>{{ $medicion->peso }}</td>
                                    <td>{{ $medicion->altura }}</td>
                                    <td>{{ $medicion->imc}}</td>

                                    <td>{{ $medicion->perímetroCadera}}</td>
                                    <td>{{ $medicion->perímetroCintura}}</td>
                                    <td>{{ $medicion->perimetroCuello}}</td>
                                    <td>{{ $medicion->pcAdominal}}</td>

                                    <td>{{ $medicion->pcAxilarMedio}}</td>
                                    <td>{{ $medicion->pcPectoral}}</td>
                                    <td>{{ $medicion->pcSubescapular}}</td>
                                    <td>{{ $medicion->pcSuprailiaco}}</td>
                                    <td>{{ $medicion->pcTricipital}}</td>
                                    <td>{{ $medicion->pcMuslo}}</td>

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

