<?php
  require_once 'restrictedDocenteJuez.php';
  include 'database.php';
  $usuario = $_SESSION['docente'];
  $pdo = Database::connect();
  $sql = 'SELECT * FROM md1_docente WHERE nomina = ? ';
  $q = $pdo->prepare($sql);
  $q->execute(array($_SESSION['docente']));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();
  $pdo = Database::connect();
  $sql2 = 'SELECT * FROM md1_jurado WHERE correo = ? ';
  $q2 = $pdo->prepare($sql2);
  $q2->execute(array($_SESSION['docente']));
  $data2 = $q2->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();

  $pdo = Database::connect();

  $consulta = "SELECT * FROM md1_proyecto WHERE correoProfesor = '$usuario' AND borrado IS NULL ";
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
    <link href="css/general.css" rel="stylesheet" type="text/css">
    
    <title>Mis Proyectos</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <a class="navbar-brand" href="pagina_inicio_docenteJuez.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
        <ul class="navbar-nav">
            <?php if($data2['correo']!= $_SESSION['docente']){?>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="mis_proyectos_docenteJuez.php">Mis proyectos</a></li>
            <?php }?>
            <?php if(($data['es_jurado']==1) || ($data2['correo']== $_SESSION['docente'])){?>
              <li class="nav-item"><a class="nav-link"  href="proyectosa_calificar.php">Proyectos a Calificar</a></li>
            <?php }?>
            <li class="nav-item"><a class="nav-link"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link"  href="ver_layout_docenteJuez.php">Ver mapa</a></li>
            <li class="nav-item"><a class="nav-link" href="anuncios_docenteJuez.php">Anuncios</a></li>
            <li class="nav-item"><a class="nav-link"  href="sobre_nosotros_docenteJuez.php">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link"  href="preguntas_frecuentes_docenteJuez.php">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a class="nav-link"  href="ajustes_docenteJuez.php">Ajustes</a></li>
          </ul>
          <a class="navbar-brand" href="logout.php">
            <img src="img/logout.png" alt="" width="40" height="40">
          </a>
        </div>


    </div>
  </nav>


    <br>
    <h1>Mis Proyectos</h1>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($pdo->query($consulta) as $colum){ ?>
              <div class="col">
                <div class="card h-100">
                    <div class="card-header"><h5 class="card-title p1-color"><?php echo $colum['nombre'] ?></h5></div>
                    <div class="card-body">
                      <p class="card-text card-p1"><?php echo $colum['descripcion'] ?></p>
                    </div>  
                    <div class="card-footer">  
                      <?php if($colum['autorizado']==0){?>
                        <a href="aprobarProyecto.php?id=<?php echo base64_encode($colum['id']) ?>" class="btn btn-success">Aprobar</a>
                      <?php }else{?>
                        <p class="p1-color">Ya has aprobado este proyecto</p>
                      <?php } ?>
                      <a href="verMas_proyecto_docenteJuez.php?id=<?php echo base64_encode($colum['id']) ?>" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
              </div>
            <?php } ?>
            <br>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
