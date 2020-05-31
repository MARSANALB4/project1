@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar plan</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($plan, [ 'route' => ['plans.update',$plan->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha inicio ') !!}
                            <input type="date-local" id="fecha_inicio" name="fecha_inicio" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha fin') !!}
                            <input type="date-local" id="fecha_fin" name="fecha_fin" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}

                            {!! Form::select('paciente_id', $pacientes,$plan->paciente_id,  ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('nutricionista_id', 'Nutricionista') !!}
                            {!! Form::select('nutricionista_id', $nutricionistas,$plan->nutricionista_id, ['class' => 'form-control']) !!}
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
