@extends('adminlte::page')

@section('title', 'Detalle Alumno')

@section('content_header')
    <h1>Información del Alumno</h1>
@stop

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header bg-primary">
                    <h3 class="card-title">
                        Información del Alumno
                    </h3>
                </div>

                <div class="card-body">

                    <h5>Numero de Control:</h5>
                    <p>{{ $alumno->Num_Control }}</p>

                    <hr>

                    <h5>Nombre:</h5>
                    <p>{{ $alumno->Nombre }}</p>

                    <hr>

                    <h5>Primer Apellido:</h5>
                    <p>{{ $alumno->Primer_ap }}</p>

                    <hr>

                    <h5>Segundo Apellido:</h5>
                    <p>{{ $alumno->Segundo_Ap }}</p>

                    <hr>

                    <h5>Fecha de Nacimiento:</h5>
                    <p>{{ $alumno->Fecha_Nac }}</p>

                    <hr>

                    <h5>Semestre:</h5>
                    <p>{{ $alumno->Semestre }}</p>

                    <hr>

                    <h5>Carrera:</h5>
                    <p>{{ $alumno->Carrera }}</p>

                    <hr>

                    <a href="{{ route('alumnos.index') }}"
                       class="btn btn-warning">

                        Volver

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@stop

@section('css')
@stop

@section('js')
@stop