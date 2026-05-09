<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header bg-primary text-white">
            Registro
        </div>

        <div class="card-body">
            
        @if(session('error'))

            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

        @endif

            <form action="{{ route('registro.post') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Nombre</label>

                    <input type="text"
                           name="nombre"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Correo</label>

                    <input type="email"
                           name="correo"
                           class="form-control"
                           placeholder="nombre@gmail.com"
                           required>
                </div>

                <div class="mb-3">
                    <label>Contraseña</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-success">
                    Registrarse
                </button>
                <a href="{{ route('login') }}"
                    class="btn btn-primary">
                    Ya tengo cuenta
                    </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>