<?php
  require_once 'restrictedAdmin.php';
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

    <title>Sobre Nosotros</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
            <li class="nav-item-admin"><a class="nav-link" href="ver_usuarios_admin.php">Ver Usuarios</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="asignar_jueces.php">Asignar Jueces</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="historicodatos.php">Historico de Datos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ver_layout_admin.php">Mapa</a></li>
            <li class="nav-item-admin"><a class="nav-link active" aria-current="page" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="preguntas_frecuentes_admin.php">Preguntas Frecuentes</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ajustes_admin.php">Ajustes</a></li>
            
          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_admin.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
        <a class="navbar-brand" href="logout.php">
          <img src="img/logout.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>

      <div class="container-fluid">
        <br>
        <h1>Sobre Nosotros</h1>
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
                <div class="card card-info2  text-white bg-primary" >
                    <div class="card-header">
                        ¿Quiénes Somos?
                        </div>
                <div class="card-body bg-light">
                    <p class="card-text card-p1">Somos la Escuela de Ingeniería y Ciencias del Tec de Monterrey Campus Puebla y organizadores de la Expo Ingenierías..</p>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card  card-info2  text-white bg-primary">
                    <div class="card-header">
                        ¿Qué es la Expo Ingenierías?
                      </div>
                    <div class="card-body bg-light">
                        <p class="card-text card-p1">Un evento organizado por la Escuela de Ingeniería y Ciencias en donde los alumnos de las distintas carreras del área tienen la oportunidad de presentar sus proyectos al público.</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="card  card-info2  text-white bg-primary">
                    <div class="card-header">
                        Misión
                        </div>
                    <div class="card-body bg-light">
                        <p class="card-text card-p1">Fomentar la participación e interés de la comunidad TEC por el área de la Ingeniería y la Ciencia.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-info2   text-white bg-primary">
                    <div class="card-header">
                        Visión
                      </div>
                    <div class="card-body bg-light">
                        <p class="card-text card-p1">Con la realización de proyectos innovadores y de valor en la Escuela de Ingeniería y Ciencias podremos contribuir positivamente a la sociedad.</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-4"></div>
          <div class="col-4"></div>
          <div class="col-4"></div>
          <div class="col-4"></div>
        </div>
      </div>
    </div>
</body>
</html>