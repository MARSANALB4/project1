@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dietas Sabado</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Comida</th>
                                <th>Día de la semana</th>
                                <th>Calorias</th>
                                <th>Tortal Calorias</th>

                            </tr>
                            @foreach ($dieta as $dieta)
                            <tr>
                                <td>{{ $dieta->comidas->name}}</td>
                                <td>{{ $dieta->semanal}}</td>
                                <td>{{ $dieta->calorias}}</td>

                            </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
