<?php
  require_once 'restrictedDocenteJuez.php';
  include 'database.php';
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
  $user = $_SESSION['docente'];
  $consulta = "SELECT DISTINCT p.nombre,p.descripcion,p.id,e.rubrica1, e.rubrica2, e.rubrica3 FROM md1_evalua as e, md1_proyecto as p, md1_jurado as j, md1_docente as d WHERE ('$user'=e.idJurado) OR ('$user'=e.idDocente)";
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
    
    <title>Proyectos a Calificar</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php if($data2['correo']!= $_SESSION['docente']){?>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="mis_proyectos_docenteJuez.php">Mis proyectos</a></li>
            <?php }?>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
            <?php if(($data['es_jurado']==1) || ($data2['correo']== $_SESSION['docente'])){?>
              <li class="nav-item-docenJuez"><a class="nav-link active" aria-current="page" href="proyectosa_calificar.php">Proyectos a Calificar</a></li>
            <?php }?>
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
    <?php
  foreach ($pdo->query($consulta) as $colum){
    ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="row row-cols-1 row-cols-md-2 mb-2 text-center">
                    <div class="col">
                      <div class="card h-100">
                        <div class='card-body card-p1'>
                          <h5 class='card-title'> <?php  echo $colum['nombre']; ?> </h5>
                          <p class='card-text'><?php  echo $colum['descripcion']; ?></p>
                          <a class="btn btn-primary" href="verMas_proyecto_docenteJuez.php?id=<?php echo $colum['id'];?>">Ver más</a>
                          <?php if ($colum['rubrica1'] == NULL) {?>
                            <a class="btn btn-primary" href="calificar_docenteJuez.php?id=<?php echo $colum['id'];?>">Calificar</a>
                            <?php }else{?>
                              <p class="btn-warning">  YA HAS CALIFICADO ESTE PROYECTO </p>
                              <P>RUBRICA 1: <?php echo $colum['rubrica1'] ?>/4</p>
                              <P>RUBRICA 2: <?php echo $colum['rubrica2'] ?>/4</p>
                              <P>RUBRICA 3: <?php echo $colum['rubrica3'] ?>/4</p>
                            <?php } ?>
                          
                        </div>
                        <br>
                      </div>
                    </div>
                  </div>
              </div>
          </div>              
    </div>
  <?php } ?>
<br>
</body>
</html>
