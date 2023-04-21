<?php
  require_once 'restrictedEstudiante.php';
  include 'database.php';
  $matricula = $_SESSION["username"];
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM md1_proyecto WHERE  correoLider = '$matricula' OR correoCompañero1 = '$matricula' OR correoCompañero2 = '$matricula' OR correoCompañero3 = '$matricula' OR correoCompañero4 = '$matricula'";
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
   <link href="css/misProyectosEstudiante.css" rel="stylesheet">
   <title>Mis Proyectos</title>
</head>
<body">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

            <li class="nav-item"><a class="nav-link" href="registrar_proyecto_estudiante.php">Registrar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="mis_proyectos_Estudiante.php">Mis proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="explorar_proyectos_estudiante.php">Explorar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_layout_estudiante.php">Ver Layout</a></li>
            <li class="nav-item"><a class="nav-link" href="resultados_estudiante.php">Resultados</a></li>
            <li class="nav-item"><a class="nav-link" href="sobre_nosotros_estudiante.php">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link" href="preguntas_frecuentes_estudiante.php">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a class="nav-link" href="ajustes_estudiante.php">Ajustes</a></li>

        </ul>
      </div>
      <a class="navbar-brand" href="pagina_inicio_estudiantes.php">
        <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
      </a>
  </div>
</nav>


    <br>
    <h1 h1-p1>Mis Proyectos</h1>
    <br>
    <?php
  foreach ($pdo->query($sql) as $colum){
    ?>
    <div class="container">
    <div class="row">
    <div class="col-12">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100">
          <?php
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          $sql1 = "SELECT * FROM md1_evaluaAdministrador WHERE idProyecto = ?";
          $q1 = $pdo->prepare($sql1);
          $q1->execute(array($colum['id']));
          $data = $q1->fetch(PDO::FETCH_ASSOC);

          $sql2 ="SELECT * FROM `md1_evaluaJurado` WHERE idProyecto=?";
          $q2 = $pdo->prepare($sql2);
          $q2->execute(array($colum['id']));
          $data2 = $q2->fetch(PDO::FETCH_ASSOC);
          
          $sql3 ="SELECT * FROM `md1_evaluaDocente` WHERE idProyecto=?";
          $q3 = $pdo->prepare($sql3);
          $q3->execute(array($colum['id']));
          $data3 = $q3->fetch(PDO::FETCH_ASSOC);
          Database::disconnect();
          if (($q1->rowCount() + $q2->rowCount() + $q3->rowCount()) == 4){
            $promedio = ($data['rubrica1']+$data['rubrica2']+$data['rubrica3']+$data2['rubrica1']+$data2['rubrica2']+$data2['rubrica3']+$data3['rubrica1']+$data3['rubrica2']+$data3['rubrica3'])/9/4*100;
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql5 = "UPDATE `md1_proyecto` SET `promedio` = ? WHERE `md1_proyecto`.`id` = ? ";
            $q5 = $pdo->prepare($sql5);
            $q5->execute(array($promedio, $colum['id']));
            Database::disconnect();
          }
          
          if ($colum['autorizado']==0){
          echo "<div class='card-header card-p1-header bg-danger'>";
          echo "Aún no autorizado";
          }else{
          if($colum['promedio'] == 0){
            echo "<div class='card-header card-p1-header bg-warning'>";
            echo "Autorizado y no calificado";
          }else{
            echo "<div class='card-header card-p1-header bg-success'>";
            echo "Autorizado y calificado";
          }
          
          }
            ?>
          </div>
          <div class="card-body p1-color">

            <h5 class="card-title">
              <?php echo $colum['nombre'];
              ?>
            </h5>
            <p class="card-text">
              <?php 
                echo $colum ['descripcion'];
              ?>
            </p>
            <?php 
              if($colum['autorizado'] == 1){
                echo '<a href="verMas_proyecto_estudiante.php?id='.$colum['id'].'" class="btn btn-primary">Ver más</a>';
              }else{
                echo '<a href="verMas_proyecto_estudiante.php?id='.$colum['id'].'" class="btn btn-primary">Ver más</a>';
                echo '<a href="editar_proyecto_estudiante.php?id='.$colum['id'].'" class="btn btn-primary">Editar</a>';
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<br>
  <?php } ?>

</body>
</html>
