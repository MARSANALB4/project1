@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear medicion antropometrica</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'antropometricas.store', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha', 'Fecha de la medición') !!}
                            <input type="date-local" id="fecha" name="fecha" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                        </div>



                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}

                            {!! Form::select('paciente_id', $users,  ['class' => 'form-control']) !!}
                        </div>

                        <br><br>

                        <div class="form-group">
                            {!! Form::label('peso', 'Peso (kg)') !!}
                            {!! Form::text('peso',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('altura', 'Altura (cm)') !!}
                            {!! Form::text('altura',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('perímetroCadera', 'Perímetro Cadera (cm)') !!}
                            {!! Form::text('perímetroCadera',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('perimetroCintura', 'Perimetro Cintura (cm)') !!}
                            {!! Form::text('perimetroCintura',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('perimetroCuello', 'Perimetro Cuello (cm)') !!}
                            {!! Form::text('perimetroCuello',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcAdominal', 'Pliegue Cutáneo Adominal (mm)') !!}
                            {!! Form::text('pcAdominal',null,['class'=>'form-control', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcAxilarMedio', 'Pliegue Cutáneo AxilarMedio (mm)') !!}
                            {!! Form::text('pcAxilarMedio',null,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcPectoral', 'Pliegue Cutáneo Pectoral (mm)') !!}
                            {!! Form::text('pcPectoral',null,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcSubescapular', 'Pliegue Cutáneo Subescapular (mm)') !!}
                            {!! Form::text('pcSubescapular',null,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcSuprailiaco', 'Pliegue Cutáneo Suprailiaco (mm)') !!}
                            {!! Form::text('pcSuprailiaco',null,['class'=>'form-control', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcTricipital', 'Pliegue Cutáneo Tricipital (mm)') !!}
                            {!! Form::text('pcTricipital',null,['class'=>'form-control', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcMuslo', 'Pliegue Cutáneo Muslo (mm)') !!}
                            {!! Form::text('pcMuslo',null,['class'=>'form-control', 'autofocus']) !!}
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
