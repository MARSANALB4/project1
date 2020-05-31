@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar alimento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($alimento, [ 'route' => ['alimentos.update',$alimento->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">

                        {!! Form::label('name', 'Nombre del alimento') !!}
                        {!! Form::text('name',$alimento->name,['class'=>'form-control', 'required', 'autofocus']) !!}


                        </div>
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
