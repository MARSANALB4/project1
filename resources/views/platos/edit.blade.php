@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Plato</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($plato, [ 'route' => ['platos.update',$plato->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}


                        <div class="form-group">
                                {!!Form::label('alimento_id', 'Paciente') !!}

                                {!! Form::select('alimento_id', $alimentos, $plato->alimento_id,  ['class' => 'form-control']) !!}
                            </div>
                        <br><br>

                        <div class="form-group">
                                {!! Form::label('cantidad', 'Cantidad') !!}
                                {!! Form::text('cantidad',$plato->cantidad,['class'=>'form-control', 'required', 'autofocus']) !!}
                            </div>
                        <div class="form-group">
                            {!!Form::label('unidad', 'Unidad') !!}

                            {!! Form::select('unidad',['rebanada' =>'Rebanada', 'racion'=>'Ración',
                            'unidad'=>'Unidad','taza'=>'Taza','gramos'=>'Gramos','mililitros'=>'Mililitros'],  ['class' => 'form-control']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                                {!! Form::label('calorias', 'Calorias') !!}
                                {!! Form::text('calorias',null,['class'=>'form-control', 'required', 'autofocus']) !!}
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
