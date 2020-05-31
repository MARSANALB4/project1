@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Dieta Diaria</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($dieta, [ 'route' => ['dietas.update',$dieta->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                            {!!Form::label('plan_id', 'Plan') !!}

                            {!! Form::select('plan_id', $plans,$dieta->plans,  ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('comida_id', 'Comida') !!}

                            {!! Form::select('comida_id', $comidas,$dieta->comida_id,  ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('semanal', 'Dia de la Semana') !!}

                            {!! Form::select('semanal',['lunes' =>'Lunes', 'martes'=>'Martes',
                            'miercoles'=>'Miercoles','jueves'=>'Jueves','viernes'=>'Viernes',
                            'sabado'=>'Sabado','domingo'=>'Domingo'],  ['class' => 'form-control']) !!}
                        </div>

                        <br><br>

                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
