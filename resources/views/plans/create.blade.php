@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear plan</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'plans.store', 'class'=>'form-inline']) !!}
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

                            {!! Form::select('paciente_id', $pacientes,  ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('nutricionista_id', 'Nutricionista') !!}
                            {!! Form::select('nutricionista_id', $nutricionistas, ['class' => 'form-control']) !!}
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
