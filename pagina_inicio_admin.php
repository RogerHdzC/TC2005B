<?php
  require_once 'restrictedAdmin.php';
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
        <a class="navbar-brand" href="pagina_inicio_admin.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="ver_usuarios_admin.php">Ver Usuarios</a></li>
            <li class="nav-item"><a class="nav-link" href="asignar_jueces.php">Asignar Jueces</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="historicodatos.php">Historico de Datos</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_layout_admin.php">Mapa</a></li>
            <li class="nav-item"><a class="nav-link" href="anuncios_admin.php">Anuncios</a></li>
            <li class="nav-item"><a class="nav-link" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link" href="preguntas_frecuentes_admin.php">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a class="nav-link" href="ajustes_admin.php">Ajustes</a></li>
          </ul>
          <a class="navbar-brand" href="logout.php">
            <img src="img/logout.png" alt="" width="40" height="40">
          </a>
        </div>

    </div>
  </nav>
  <div class="container-fluid">
  <br>
  <h1>Inicio</h1>
  <div class="container">
    <div class="row">
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p3" href="ver_usuarios_admin.php" role="button">Ver Usuarios</a>
      </div>
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p3" href="ver_proyectos_Admin.php" role="button">Ver Proyectos</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p3" href="asignar_jueces.php" role="button">Asignar Jueces</a>  
      
      </div>
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p3" href="ver_layout_admin.php" role="button">Ver mapa</a>
        
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p3" href="historicodatos.php" role="button">Descargar Histórico de Datos</a>
      </div>
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p3" href="anuncios_admin.php" role="button">Anuncios</a>
        
      </div>
    </div>
    <br>

    <div class="row">
    <div class="col-6 col-p1-6">
    <a class="btn btn-primary btn-custom btn-p3" href="preguntas_frecuentes_admin.php" role="button">Preguntas Frecuentes</a>
      </div>
      <div class="col-6 col-p1-6">
        <a class="btn btn-primary btn-custom btn-p3" href="sobre_nosotros_admin.php" role="button">Sobre Nosotros</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col">
      <a class="btn btn-primary btn-custom btn-p3" href="ajustes_admin.php" role="button">Ajustes</a>
      </div>
    </div>
    <br>

    </div>
    </div>
  </div>
</div>
</form>
</body>
</html>