@extends('adminlte::page')

@section('title', 'Editar Alumno')

@section('content_header')
    <h1>Editar Alumno</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header bg-warning">
        <h3 class="card-title">Editar Registro</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Numero de Control</label>

                <input type="number"
                       name="Num_Control"
                       class="form-control"
                       required
                       value="{{ old('Num_Control', $alumno->Num_Control) }}">

                @error('Num_Control')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Nombre</label>

                <input type="text"
                       name="Nombre"
                       class="form-control"
                       required
                       pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]+"
                       value="{{ old('Nombre', $alumno->Nombre) }}">

                @error('Nombre')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Primer Apellido</label>

                <input type="text"
                       name="Primer_ap"
                       class="form-control"
                       required
                       pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]+"
                       value="{{ old('Primer_ap', $alumno->Primer_ap) }}">

                @error('Primer_ap')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Segundo Apellido</label>

                <input type="text"
                       name="Segundo_Ap"
                       class="form-control"
                       required
                       pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]+"
                       value="{{ old('Segundo_Ap', $alumno->Segundo_Ap) }}">

                @error('Segundo_Ap')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Fecha Nacimiento</label>

                <input type="date"
                       name="Fecha_Nac"
                       class="form-control"
                       required
                       value="{{ old('Fecha_Nac', $alumno->Fecha_Nac) }}">

                @error('Fecha_Nac')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Semestre</label>

                <input type="number"
                       name="Semestre"
                       class="form-control"
                       required
                       min="1"
                       max="12"
                       value="{{ old('Semestre', $alumno->Semestre) }}">

                @error('Semestre')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Carrera</label>

                <input type="text"
                       name="Carrera"
                       class="form-control"
                       required
                       value="{{ old('Carrera', $alumno->Carrera) }}">

                @error('Carrera')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button href="{{ route('alumnos.index') }}" type="submit" class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>

@stop