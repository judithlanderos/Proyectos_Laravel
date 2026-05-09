@extends('adminlte::page')

@section('title', 'Servicios Escolares')

@section('content_header')
    <h1 class="text-center">SERVICIOS ESCOLARES</h1>
@stop

@section('content')

    {{-- MENSAJE --}}
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert" id="msj">
            {{ Session::get('message') }}
        </div>
    @endif

    {{-- BREADCRUMB --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
            <li class="breadcrumb-item active">Alumnos</li>
        </ol>
    </nav>

    {{-- CARD ADMINLTE --}}
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Listado de Alumnos</h3>

            <div class="card-tools">
                <a href="{{ route('alumnos.create') }}" class="btn btn-success btn-sm">
                    AGREGAR
                </a>
            </div>
        </div>

        <div class="card-body table-responsive p-0">

            <table class="table table-hover text-nowrap text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Número de Control</th>
                        <th>Nombre</th>
                        <th>Semestre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($alumnos as $a)

                        <tr>
                            <td>{{ $a->Num_Control }}</td>
                            <td>{{ $a->Nombre }}</td>
                            <td>{{ $a->Semestre }}</td>
                            <td>{{ $a->Fecha_Nac }}</td>

                            <td>

                                <form action="{{ route('alumnos.destroy', $a->id) }}"
                                      method="POST"
                                      onsubmit="return confirmarEliminacion()">

                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-primary btn-sm"
                                       href="{{ route('alumnos.show', $a->id) }}">
                                        Detalle
                                    </a>

                                    <a class="btn btn-warning btn-sm"
                                       href="{{ route('alumnos.edit', $a->id) }}">
                                        Editar
                                    </a>

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="card-footer clearfix">
            {!! $alumnos->links() !!}
        </div>

    </div>

@stop

@section('css')

@stop

@section('js')

<script>

    $(document).ready(function () {

        setTimeout(function () {
            $("#msj").fadeOut(1500);
        }, 3000);

    });

    function confirmarEliminacion()
    {
        return confirm("¿Estas seguro de ELIMINAR?");
    }

</script>

@stop