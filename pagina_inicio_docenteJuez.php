<?php
  require_once 'restrictedDocenteJuez.php';
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
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="mis_proyectos_docenteJuez.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link"  href="mis_proyectos_docenteJuez.php">Mis proyectos</a></li>
            <li class="nav-item"><a class="nav-link"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link"  href="proyectosa_calificar.php">Proyectos a Calificar</a></li>
            <li class="nav-item"><a class="nav-link"  href="ver_layout_docenteJuez.php">Ver Layout</a></li>
            <li class="nav-item"><a class="nav-link"  href="sobre_nosotros_docenteJuez.php">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link"  href="preguntas_frecuentes_docenteJuez.php">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a class="nav-link"  href="ajustes_docenteJuez.php">Ajustes</a></li>
          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_docenteJuez.php">
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
        <a class="btn btn-primary btn-custom btn-p3" href="mis_proyectos_docenteJuez.php" role="button">Mis Proyectos</a>
      </div>
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="explorar_proyectos_docentejuez.php" role="button">Explorar Proyectos</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="proyectosa_calificar.php" role="button">Proyectos a Calificar</a>
      </div>
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="ver_layout_docenteJuez.php" role="button">Ver Layout</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="sobre_nosotros_docenteJuez.php" role="button">Sobre Nosotros</a>
      </div>
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="preguntas_frecuentes_docenteJuez.php" role="button">Preguntas Frecuentes</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col - 6">
        <a class="btn btn-primary btn-custom btn-p3" href="ajustes_docenteJuez.php" role="button">Ajustes</a>
      </div>
    </div>
    <br>
    </div>
  </div>
</div>
</body>
</html>