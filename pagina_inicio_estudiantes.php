<?php
  require_once 'restrictedEstudiante.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="css/general.css" rel="stylesheet">
    <link href="css/inicioEstudiante.css" rel="stylesheet">
    <title>Inicio</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="pagina_inicio_estudiantes.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="registrar_proyecto_estudiante.php">Registrar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="mis_proyectos_Estudiante.php">Mis proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="explorar_proyectos_estudiante.php">Explorar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_layout_estudiante.php">Ver Layout</a></li>
            <li class="nav-item"><a class="nav-link" href="resultados_estudiante.php">Resultados</a></li>
            <li class="nav-item"><a class="nav-link" href="sobre_nosotros_estudiante.php">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link" href="preguntas_frecuentes_estudiante.php">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a class="nav-link" href="ajustes_estudiante.php">Ajustes</a></li>

          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_estudiantes.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>

<div class="container-fluid">
  <br></br>
  <h1>Inicio</h1>
  <br></br>
  <div class="container">
    <div class="row">
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="registrar_proyecto_estudiante.php" role="button">Registrar Proyecto</a>
      </div>
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="mis_proyectos_Estudiante.php" role="button">Mis Proyectos</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="explorar_proyectos_estudiante.php" role="button">Explorar Proyectos</a>
      </div>
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="ver_layout_estudiante.php" role="button">Ver Layout</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="resultados_estudiante.php" role="button">Resultados</a>
      </div>
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="sobre_nosotros_estudiante.php" role="button">Sobre Nosotros</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="preguntas_frecuentes_estudiante.php" role="button">Preguntas Frecuentes</a>
      </div>
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="ajustes_estudiante.php" role="button">Ajustes</a>
      </div>
    </div>
    </div>
  </div>
</div> 
</body>
</html>