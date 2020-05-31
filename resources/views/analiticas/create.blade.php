@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear medicion analitica</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'analiticas.store', 'class'=>'form-inline']) !!}

                        <div class="form-group">
                            {!! Form::label('fecha', 'Fecha de la medición') !!}
                            <input type="date-local" id="fecha" name="fecha" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                        </div>


                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}

                            {!! Form::select('paciente_id', $users,  ['class' => 'form-control']) !!}
                        </div>

                        <br><br>
                        <div class="form-group">
                            {!! Form::label('hdl', 'Colesterol HDL (mg/dL)') !!}
                            {!! Form::text('hdl',null,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>
                        <div class="form-group">
                            {!! Form::label('ldl', 'Colesterol LDL (mg/dL)') !!}
                            {!! Form::text('ldl',null,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>
                        <div class="form-group">
                            {!! Form::label('colesterol', 'Colesterol (mg/dL)') !!}
                            {!! Form::text('colesterol',null,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>
                        <div class="form-group">
                            {!! Form::label('pADiastolica', 'Presión Arterial Diastolica (mmHg)') !!}
                            {!! Form::text('pADiastolica',null,['class'=>'form-control', 'autofocus']) !!}
                        </div>
                        <br><br>
                        <div class="form-group">
                            {!! Form::label('pASistolica', 'Presión Arterial Sistolica (mmHg)') !!}
                            {!! Form::text('pASistolica',null,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>
                        <div class="form-group">
                            {!! Form::label('trigliceridos', 'Trigliceridos (mg/dL)') !!}
                            {!! Form::text('trigliceridos',null,['class'=>'form-control',  'autofocus']) !!}
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
