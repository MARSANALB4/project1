@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Comida</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'comidas.store', 'class'=>'form-inline']) !!}



                        <div class="form-group">
                            {!!Form::label('plato_id', 'Plato') !!}

                            {!! Form::select('plato_id', $platos,  ['class' => 'form-control']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!!Form::label('TipoComida', 'Comida') !!}

                            {!! Form::select('TipoComida',['desayuno' =>'Desayuno', 'mediaMañana'=>'Media Mañana',
                            'almuerzo'=>'Almuerzo','merienda'=>'Merienda','cena'=>'Cena'],  ['class' => 'form-control']) !!}
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
