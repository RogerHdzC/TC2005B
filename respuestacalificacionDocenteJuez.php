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

  $id = 0;
  if ( !empty($_GET['id'])) {
     $id = $_REQUEST['id'];
  }

  $user = $_SESSION['docente'];
  $rubrica1 = $_POST['pregunta1'];
  $rubrica2 = $_POST['pregunta2'];
  $rubrica3 = $_POST['pregunta3'];


  
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($data2['correo']== $_SESSION['docente']){
    $sql ="UPDATE `md1_evaluaJurado` SET `rubrica1`= ?, `rubrica2`= ?, `rubrica3`= ? WHERE (idProyecto=? AND idJurado = ?)";

    $q = $pdo->prepare($sql);

    $q->execute(array($rubrica1,$rubrica2,$rubrica3,$id,$user));

    Database::disconnect();
  }else{
    $sql ="UPDATE `md1_evaluaDocente` SET `rubrica1`= ?, `rubrica2`= ?, `rubrica3`= ? WHERE (idProyecto=? AND idJurado = ?)";

    $q = $pdo->prepare($sql);

    $q->execute(array($rubrica1,$rubrica2,$rubrica3,$id,$user));

    Database::disconnect();
  }
  
  
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
    
    <title>Registrar Proyectos</title>
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
            <?php if(($data['es_jurado']==1) || ($data2['correo']== $_SESSION['docente'])){?>
              <li class="nav-item-docenJuez"><a class="nav-link"  href="proyectosa_calificar.php">Proyectos a Calificar</a></li>
            <?php }?>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
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

    <br></br>
    <br></br>
    <div class="card col-6 offset-3 text-white bg-primary" style="max-width: 80rem;">
        <div class="card-body">
          <h2 class="card-title">¡Muy bien!</h2>
          <h4 class="card-text">El Proyecto ha sido calificado.</p>
        </div>
    </div>
    <br></br>
        <button type="button" class="btn btn-primary btn-custom btn-p1" onclick="document.location='proyectosa_calificar.php'">Continuar</button>
</body>
</html>