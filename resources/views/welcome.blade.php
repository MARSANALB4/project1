<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>+Nutricion</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;

            font-family: 'Raleway', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #2B6607;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Iniciar Sesión</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registro</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="figure-img">
        <img src="logoNutricion1.png"
             title="Logo de +NUTRICION.">

        <div class="title m-b-md">
            +NUTRUCIÓN
        </div>
        <div class="words">
            Web para la gestión nutricional de pacientes para clínicas de dietética o nutrición.<br>
            Los clientes de este proyecto son los propietarios de una clínica privada de nutrición.<br>
            Los usuarios de esta web serán los nutricionistas y pacientes de la clínica.<br>
            <br>
            <b>Objetivos de +NUTRICION:</b><br>
            - Facilitar a los nutricionistas el seguimiento del paciente.<br>
            - Permitir a los pacientes coonsultar sus planes dietéticos en cualquier momento o lugar.<br>
            - Permitir a nutricionistas y pacientes consultar y gestionar sus citas.<br>
            - Evitar imprimir los planes dietéticos.<br>
            - Aumentar el grado de addesión de los pacientes al tratamiento.<br>
        </div>
        <div class="links">

            <a href="https://github.com/MARSANALB4/project1">GITHUB</a>
        </div>
    </div>
</div>
</body>
</html>
