@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar medición antropometrica</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medicion, [ 'route' => ['antropometricas.update',$medicion->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha', 'Fecha de la medición') !!}
                            <input type="date-local" id="fecha" name="fecha" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                        </div>


                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}

                            {!! Form::select('paciente_id', $users, $medicion->paciente_id, ['class' => 'form-control']) !!}
                        </div>

                        <br><br>


                        <div class="form-group">
                            {!! Form::label('peso', 'Peso (kg)') !!}
                            {!! Form::text('peso',$medicion->peso,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('altura', 'Altura (cm)') !!}
                            {!! Form::text('altura',$medicion->altura,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('perímetroCadera', 'Perímetro Cadera (cm)') !!}
                            {!! Form::text('perímetroCadera',$medicion->perímetroCadera,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('perimetroCintura', 'Perimetro Cintura (cm)') !!}
                            {!! Form::text('perimetroCintura',$medicion->perímetroCintura,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('perimetroCuello', 'Perimetro Cuello (cm)') !!}
                            {!! Form::text('perimetroCuello',$medicion->perimetroCuello,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcAdominal', 'Pliegue Cutáneo Adominal') !!}
                            {!! Form::text('pcAdominal',$medicion->pcAdominal,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcAxilarMedio', 'Pliegue Cutáneo AxilarMedio (mm)') !!}
                            {!! Form::text('pcAxilarMedio',$medicion->pcAxilarMedio,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcPectoral', 'Pliegue Cutáneo Pectoral (mm)') !!}
                            {!! Form::text('pcPectoral',$medicion->pcPectoral,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcSubescapular', 'Pliegue Cutáneo Subescapular (mm)') !!}
                            {!! Form::text('pcSubescapular',$medicion->pcSubescapular,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcSuprailiaco', 'Pliegue Cutáneo Suprailiaco (mm)') !!}
                            {!! Form::text('pcSuprailiaco',$medicion->pcSuprailiaco,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcTricipital', 'Pliegue Cutáneo Tricipital (mm)') !!}
                            {!! Form::text('pcTricipital',null,['class'=>'form-control',  'autofocus']) !!}
                        </div>
                        <br><br>

                        <div class="form-group">
                            {!! Form::label('pcMuslo', 'Pliegue Cutáneo Muslo (mm)') !!}
                            {!! Form::text('pcMuslo',null,['class'=>'form-control',  'autofocus']) !!}
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
