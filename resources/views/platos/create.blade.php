@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear plato</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'platos.store', 'class'=>'form-inline']) !!}



                        <div class="form-group">
                            {!!Form::label('alimento_id', 'alimento') !!}

                            {!! Form::select('alimento_id', $alimentos,  ['class' => 'form-control']) !!}
                        </div>
                        <br><br>


                        <div class="form-group">
                            {!! Form::label('cantidad', 'Cantidad') !!}
                            {!! Form::text('cantidad',null,['class'=>'form-control', 'required', 'autofocus']) !!}
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


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
