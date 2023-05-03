<?php
  require_once 'restrictedEstudiante.php';
  include 'database.php';
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
      <a class="navbar-brand" href="pagina_inicio_estudiantes.php">
      <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
    </a>
    <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="registrar_proyecto_estudiante.php">Registrar Proyectos</a></li>
          <li class="nav-item"><a class="nav-link" href="mis_proyectos_Estudiante.php">Mis Proyectos</a></li>
          <li class="nav-item"><a class="nav-link" href="explorar_proyectos_estudiante.php">Explorar Proyectos</a></li>
          <li class="nav-item"><a class="nav-link" href="ver_layout_estudiante.php">Ver Mapa</a></li>
          <li class="nav-item"><a class="nav-link" href="resultados_estudiante.php">Resultados</a></li>
          <li class="nav-item"><a class="nav-link" href="ver_ganadores_estudiante.php">Ver Ganadores</a></li>
          <li class="nav-item"><a class="nav-link" href="anuncios_estudiantes.php">Anuncios</a></li>
          <li class="nav-item"><a class="nav-link" href="sobre_nosotros_estudiante.php">Sobre Nosotros</a></li>
          <li class="nav-item"><a class="nav-link" href="preguntas_frecuentes_estudiante.php">Preguntas Frecuentes</a></li>
          <li class="nav-item"><a class="nav-link" href="ajustes_estudiante.php">Ajustes</a></li>
        </ul>
        <a class="navbar-brand" href="logout.php">
            <img src="img/logout.png" alt="" width="40" height="40">
          </a>
      </div>
  </div>
</nav>
<div class="container" style="background-color:gray">
<?php 
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM md1_estudiante WHERE  matricula = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['username']));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
  if(($data['modelo'] !== NULL && $data['carrera'] !== NULL && $data['semestre'] !== NULL )){
    
  }else{ ?>
    <p class="text-warning">Completa los datos de tu perfil en la pestaña de ajustes</p>
  <?php } ?> 
</div>  
<div class="container-fluid">
  <br>
  <h1>Inicio</h1>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p9" href="registrar_proyecto_estudiante.php" role="button">Registrar Proyecto</a>
      </div>
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p9" href="mis_proyectos_Estudiante.php" role="button">Mis Proyectos</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p9" href="explorar_proyectos_estudiante.php" role="button">Explorar Proyectos</a>
      </div>
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p9" href="ver_layout_estudiante.php" role="button">Ver Mapa</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p9" href="resultados_estudiante.php" role="button">Resultados</a>
      </div>
      <div class="col-6 col-p1-6">
      <a class="btn btn-primary btn-custom btn-p9" href="ver_ganadores_estudiante.php" role="button">Ver Ganadores</a>
    </div>
    </div>
    <br>
    <div class="row">
      <div class="col-6 col-p1-6">
      <a class="btn btn-primary btn-custom btn-p9" href="anuncios_estudiantes.php" role="button">Anuncios</a>
      </div>
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p9" href="sobre_nosotros_estudiante.php" role="button">Sobre Nosotros</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p9" href="preguntas_frecuentes_estudiante.php" role="button">Preguntas Frecuentes</a>
      </div>
      <div class="col-6 col-p1-6">
      <a class="btn btn-primary btn-custom btn-p9" href="ajustes_estudiante.php" role="button">Ajustes</a>
        <br></br>  
      </div>
    </div>
    </div>
  </div>
</div> 
</body>
</html>