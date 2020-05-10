@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar objetivo</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($objetivo, [ 'route' => ['objetivos.update',$objetivo->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">

                        {!! Form::label('peso', 'Peso objetivo') !!}
                        {!! Form::text('peso',$objetivo->peso,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">

                            {!! Form::label('imc', 'IMC objetivo') !!}
                            {!! Form::text('imc',$objetivo->imc,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}
                            <br>
                            {!! Form::select('paciente_id', $users=\App\User::all()->where('userType','=','paciente'),$objetivo->paciente_id, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
