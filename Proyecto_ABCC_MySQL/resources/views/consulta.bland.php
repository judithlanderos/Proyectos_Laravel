<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Detalle de Alumno</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="../public/assets/images/estudiantes.png" class="img-fluid">
        </a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="/">INICIO</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Asignaturas</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Docentes</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <h1 class="text-center mt-5 mb-3">SERVICIOS ESCOLARES</h1>

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Alumnos</a></li>
            <li class="breadcrumb-item active">Detalle</li>
          </ol>
        </nav>

        <div class="card shadow-sm">
          <div class="card-header bg-success text-white">
            <h4 class="mb-0">Información del Alumno</h4>
          </div>
          <div class="card-body">

            <div id="contenido">
              <div class="text-center py-4">
                <div class="spinner-border text-success" role="status"></div>
                <p class="mt-2 text-muted">Cargando datos...</p>
              </div>
            </div>

            <div class="mt-4">
              <a href="/" class="btn btn-secondary">← Regresar</a>
            </div>

          </div>
        </div>

      </div>
    </div>

    <footer class="text-muted text-center mt-4 mb-3">
      FOOTER
    </footer>
  </div>

  <script>
    // Obtiene el id ya sea de ?id=X o de la ruta /detalle/X
    const url = new URL(window.location.href);
    const id = url.searchParams.get("id") || window.location.pathname.split("/").pop();

    fetch("/alumnos/" + id)
      .then(response => {
        if (response.ok) return response.json();
        throw new Error("Error en la respuesta");
      })
      .then(data => {
        if (data && data.length > 0) {
          const a = data[0];
          const fecha = new Date(a.FechaNac).toLocaleDateString('es-MX');

          document.getElementById("contenido").innerHTML = `
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th class="table-success" style="width: 40%">Número de Control</th>
                  <td>${a.NumControl}</td>
                </tr>
                <tr>
                  <th class="table-success">Nombre</th>
                  <td>${a.Nombre}</td>
                </tr>
                <tr>
                  <th class="table-success">Primer Apellido</th>
                  <td>${a.PrimerAp}</td>
                </tr>
                <tr>
                  <th class="table-success">Segundo Apellido</th>
                  <td>${a.SegundoAp}</td>
                </tr>
                <tr>
                  <th class="table-success">Fecha de Nacimiento</th>
                  <td>${fecha}</td>
                </tr>
                <tr>
                  <th class="table-success">Semestre</th>
                  <td>${a.Semestre}</td>
                </tr>
                <tr>
                  <th class="table-success">Carrera</th>
                  <td>${a.Carrera}</td>
                </tr>
              </tbody>
            </table>
          `;
        } else {
          document.getElementById("contenido").innerHTML = `
            <div class="alert alert-warning text-center">No se encontró el alumno.</div>
          `;
        }
      })
      .catch(err => {
        console.error(err);
        document.getElementById("contenido").innerHTML = `
          <div class="alert alert-danger text-center">Error al cargar los datos.</div>
        `;
      });
  </script>

</body>
</html>