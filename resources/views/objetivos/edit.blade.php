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
                            {!! Form::label('fecha_inicio', 'Fecha inicio objetivo') !!}
                            <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha fin objetivo') !!}
                            <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />
                        </div>

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

                            {!! Form::select('paciente_id', $users,$objetivo->paciente_id, ['class' => 'form-control']) !!}

                        </div>

                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
