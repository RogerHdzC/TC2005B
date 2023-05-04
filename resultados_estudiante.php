<?php
  require_once 'restrictedEstudiante.php';
  include 'database.php';
  $matricula = $_SESSION["username"];
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM md1_proyecto WHERE autorizado=1 AND promedio != 0 AND (correoLider = '$matricula' OR correoCompañero1 = '$matricula' OR correoCompañero2 = '$matricula' OR correoCompañero3 = '$matricula' OR correoCompañero4 = '$matricula') AND borrado IS NULL";
  Database::disconnect();

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
   <link href="css/resultadosEstudiante.css" rel="stylesheet">
   <title>Resultados</title>
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
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="resultados_estudiante.php">Resultados</a></li>
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

    <br>
    <h1>Resultados</h1>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($pdo->query($sql) as $colum){ ?>
              <div class="col">
                <div class="card h-100">
                      <div class='card-header card-p1-header bg-info'><p>Calificado</p></div>
                <div class="card-body p1-color">
                  <h5 class="card-title"><?php echo $colum['nombre'];?></h5>
                  <p class="card-text"><?php echo $colum ['descripcion'];?></p>
                  <?php
                    echo '<p>'. $colum['promedio'] . '</p>';
                    echo '<a href="reconocimiento.php?id='.$colum['id'].'" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Descargar Reconocimiento</a>';
                  ?>
                </div>
              </div>
            </div>
                <br>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
