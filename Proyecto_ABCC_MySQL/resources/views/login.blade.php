<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header bg-dark text-white">
            Iniciar Sesión
        </div>

        <div class="card-body">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Correo</label>

                    <input type="email"
                           name="correo"
                           class="form-control"
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
                    Ingresar
                </button>

                <a href="{{ route('registro') }}"
                   class="btn btn-primary">
                    Crear cuenta
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>