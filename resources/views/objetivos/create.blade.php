@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear objetivo</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'objetivos.store', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha inicio objetivo') !!}
                            <input type="date-local" id="fecha_inicio" name="fecha_inicio" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha fin objetivo') !!}
                            <input type="date-local" id="fecha_fin" name="fecha_fin" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                        </div>
                        <div class="form-group">
                        {!! Form::label('peso', 'Peso objetivo') !!}
                        {!! Form::text('peso',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('imc', 'IMC objetivo') !!}
                            {!! Form::text('imc',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}

                            {!! Form::select('paciente_id', $users,  ['class' => 'form-control']) !!}
                        </div>



                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
