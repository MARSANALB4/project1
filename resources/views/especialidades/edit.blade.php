@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar especialidad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($especialidad, [ 'route' => ['especialidades.update',$especialidad->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">

                        {!! Form::label('name', 'Nombre de la especialidad') !!}
                        {!! Form::text('name',$especialidad->name,['class'=>'form-control', 'required', 'autofocus']) !!}

                        <div class="form-group">
                            {!!Form::label('nutricionista_id', 'Nutricionista') !!}

                            {!! Form::select('nutricionista_id', $nutricionistas, $especialidad->nutricionista_id, ['class' => 'form-control']) !!}
                        </div>

                        </div>
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
