@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar paciente</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($paciente, [ 'route' => ['pacientes.update',$paciente->id], 'method'=>'PUT']) !!}


                        <div class="form-group">
                            {!! Form::label('dni', 'DNI del paciente') !!}
                            {!! Form::text('dni',$paciente->dni,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('edad', 'Fecha de nacimiento del paciente') !!}


                            <input type="date-local" id="edad" name="edad" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />


                        </div>

                        <div class="form-group">
                            {!!Form::label('sexo', 'Sexo del paciente') !!}

                            {!! Form::select('sexo',['mujer' =>'Mujer', 'hombre'=>'Hombre'],  ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('telefono', 'Telefono del paciente') !!}
                            {!! Form::text('telefono',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('domicilio', 'Domicilio del paciente') !!}
                            {!! Form::text('domicilio',null,['class'=>'form-control', 'required']) !!}

                        </div>
                        <div class="form-group">
                            {!!Form::label('actividad', 'Nivel de actividad del paciente') !!}

                            {!! Form::select('actividad',['sedentario' =>'Sedentario', 'pocoActivo'=>'Poco activo',
                            'medianamenteActivo'=>'MedianamenteActivo', 'muyActivo'=>'Muy activo',
                            'extraActivo'=>'Extra activo'],  ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
