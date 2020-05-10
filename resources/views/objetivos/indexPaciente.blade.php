@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Objetivos</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Peso Objetivo</th>
                                <th>IMC Objetivo</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($objetivos as $objetivo)


                                <tr>
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

