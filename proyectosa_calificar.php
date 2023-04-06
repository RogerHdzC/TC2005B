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
   <link href="css/misProyectosDocenteJuez.css" rel="stylesheet">
   <title>Proyectos a Calificar</title>
</head>
<body class="p1-color">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

            <li class="nav-item-docenJuez"><a class="nav-link" href="mis_proyectos_docenteJuez.php">Mis proyectos</a></li>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
            <li class="nav-item-docenJuez"><a class="nav-link active" aria-current="page" href="proyectosa_calificar.php">Proyectos a Calificar</a></li>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="ver_layout_docenteJuez.php">Ver Layout</a></li>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="sobre_nosotros_docenteJuez.php">Sobre Nosotros</a></li>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="preguntas_frecuentes_docenteJuez.php">Preguntas Frecuentes</a></li>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="ajustes_docenteJuez.php">Ajustes</a></li>
          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_docenteJuez.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>
    <br>
    <h1 class="h1-p1">Proyectos a Calificar</h1>
    <br>
    <div class="container">
    <div class="row">
    <div class="col-12">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100">
            <img src="img/ep2.jpg" class="card-img-top" alt="..." width="100%" height="100%">
            <div class="card-body">
              <h5 class="card-title">Proyecto 1</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
              <a href="calificar_docenteJuez.php" class="btn btn-primary">Calificar</a>
              <a href="verMas_proyecto_docenteJuez.php" class="btn btn-primary">Ver más</a>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card h-100">
            <img src="img/app.jpg" class="card-img-top" alt="..." width="100%" height="100%">
            <div class="card-body">
              <h5 class="card-title">Proyecto 2</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
              <a href="calificar_docenteJuez.php" class="btn btn-primary">Calificar</a>
              <a href="verMas_proyecto_docenteJuez.php" class="btn btn-primary">Ver más</a>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card h-100">
            <img src="img/ep4.jpeg" class="card-img-top" alt="..." width="100%" height="100%">
            <div class="card-body">
              <h5 class="card-title">Proyecto 3</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
              <a href="calificar_docenteJuez.php" class="btn btn-primary">Calificar</a>
              <a href="verMas_proyecto_docenteJuez.php" class="btn btn-primary">Ver más</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<br>
</body>
</html>
