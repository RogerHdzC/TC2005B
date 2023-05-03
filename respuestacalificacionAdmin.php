<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
  $pdo = Database::connect();

  $id = 0;
//  echo "  ID BEFORE: ".$id;
  if ( !empty($_GET['id'])) {
     $id = base64_decode($_REQUEST['id']);
  }
//  echo "  ID AFTER: ".$id;
  $rubrica1 = $_POST['pregunta1'];
  $rubrica2 = $_POST['pregunta2'];
  $rubrica3 = $_POST['pregunta3'];
  $rubrica4 = $_POST['pregunta4'];
  $rubrica5 = $_POST['pregunta5'];
  
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM md1_evaluaAdministrador WHERE idProyecto = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
// echo "      SQL:  ".$sql."   ID: ".$id;


  if ($q -> rowCount() > 0){
   $sql ="UPDATE `md1_evaluaAdministrador` SET `rubrica1`= ?, `rubrica2`= ?, `rubrica3`= ?, `rubrica4`= ?, `rubrica5`= ? WHERE (idProyecto=? AND idJurado = ?)";
    
   // echo "R: ".$rubrica1."R: ".$rubrica2."R: ".$rubrica3."R: ".$rubrica4."R: ".$rubrica5;
   // echo "    USUARIO: ".$_SESSION['admin']."     ID: ".$id;
     $q = $pdo->prepare($sql);
   
     $q->execute(array($rubrica1,$rubrica2,$rubrica3,$rubrica4,$rubrica5,$id,$_SESSION['admin']));
   // echo "PARTE FINAL CORRECTA";
     Database::disconnect();
  }else{
   // echo "         ---------ERROR------    ";
   header('Location: ver_proyectos_Admin.php');
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
    <link href="css/respuestaCalificacion.css" rel="stylesheet">

    <title>Registrar Proyecto</title>

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
            <li class="nav-item-admin"><a class="nav-link" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="preguntas_frecuentes_admin.php">Preguntas Frecuentes</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="historicodatos.php">Historico de Datos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ver_layout_admin.php">Layout</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ajustes_admin.php">Ajustes</a></li>
            
          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_admin.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>
  <br></br>
    <br></br>
    <br></br>
    <div class="card col-6 offset-3 text-white bg-dark" style="max-width: 80rem;">
        <div class="card-body">
          <h2 class="card-title">¡Muy bien!</h2>
          <h4 class="card-text">El Proyecto ha sido calificado.</p>
        </div>
    </div>
    <br></br>
        <button type="button" class="btn btn-primary btn-custom btn-p1" onclick="document.location='ver_proyectos_Admin.php'">Continuar</button>
</body>
</html>