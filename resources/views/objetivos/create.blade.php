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
                        {!! Form::label('peso', 'Peso objetivo') !!}
                        {!! Form::text('peso',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('imc', 'IMC objetivo') !!}
                            {!! Form::text('imc',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}
                            <br>
                            {!! Form::select('paciente_id', $users=\App\User::all()->where('userType','=','paciente'),  ['class' => 'form-control']) !!}
                        </div>



                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
