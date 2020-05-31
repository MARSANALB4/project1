@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Dieta Diaria</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'dietas.store', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                            {!!Form::label('plan_id', 'Plan') !!}

                            {!! Form::select('plan_id', $plans,null,  ['class' => 'form-control']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!!Form::label('comida_id', 'Comida') !!}

                            {!! Form::select('comida_id', $comidas,null,  ['class' => 'form-control']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!!Form::label('semanal', 'Dia de la Semana') !!}

                            {!! Form::select('semanal',['lunes' =>'Lunes', 'martes'=>'Martes',
                            'miercoles'=>'Miercoles','jueves'=>'Jueves','viernes'=>'Viernes',
                            'sabado'=>'Sabado','domingo'=>'Domingo'],  ['class' => 'form-control']) !!}
                        </div>

                        <br><br>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
