<?php
  require_once 'restrictedEstudiante.php';
  include 'database.php';
  $matricula = $_SESSION["username"];
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM md1_proyecto WHERE  (correoLider = '$matricula' OR correoCompañero1 = '$matricula' OR correoCompañero2 = '$matricula' OR correoCompañero3 = '$matricula' OR correoCompañero4 = '$matricula' ) AND borrado IS NULL";
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
      <a class="navbar-brand" href="pagina_inicio_estudiantes.php">
      <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
    </a>
      <ul class="navbar-nav">

            <li class="nav-item"><a class="nav-link" href="registrar_proyecto_estudiante.php">Registrar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="mis_proyectos_Estudiante.php">Mis proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="explorar_proyectos_estudiante.php">Explorar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="resultados_estudiante.php">Resultados</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_layout_estudiante.php">Ver mapa</a></li>
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
<h1 h1-p1>Mis Proyectos</h1>
<br>
<div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php foreach ($pdo->query($sql) as $colum){ ?>
            <div class="col">
              <div class="card h-100">
                <?php
                $rubrica1_1=0;
                $rubrica1_2=0;
                $rubrica1_3=0;
                $rubrica1_4=0;
                $rubrica1_5=0;


                $rubrica2_1=0;
                $rubrica2_2=0;
                $rubrica2_3=0;
                $rubrica2_4=0;
                $rubrica2_5=0;


                $rubrica3_1=0;
                $rubrica3_2=0;
                $rubrica3_3=0;
                $rubrica3_4=0;
                $rubrica3_5=0;
                  $pdo = Database::connect();
                  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  
                  $sql1 = 'SELECT * FROM md1_evaluaAdministrador WHERE idProyecto = '.$colum['id'].'';
                  $q1 = $pdo->prepare($sql1);
                  $q1->execute(array());

                  $sql2 ="SELECT * FROM `md1_evaluaJurado` WHERE idProyecto={$colum['id']}";
                  $q2 = $pdo->prepare($sql2);
                  $q2->execute(array());
                  
                  $sql3 ="SELECT * FROM `md1_evaluaDocente` WHERE idProyecto={$colum['id']}";
                  $q3 = $pdo->prepare($sql3);
                  $q3->execute(array());
                  Database::disconnect();
                  foreach ($pdo->query($sql1) as $colum2){
                    $rubrica1_1=$rubrica1_1 + $colum2['rubrica1'];
                    $rubrica1_2=$rubrica1_2 + $colum2['rubrica2'];
                    $rubrica1_3=$rubrica1_3 + $colum2['rubrica3'];
                    $rubrica1_4=$rubrica1_4 + $colum2['rubrica4'];
                    $rubrica1_5=$rubrica1_5 + $colum2['rubrica5'];
                  }

                  foreach ($pdo->query($sql2) as $colum2){
                    $rubrica2_1=$rubrica2_1 + $colum2['rubrica1'];
                    $rubrica2_2=$rubrica2_2 + $colum2['rubrica2'];
                    $rubrica2_3=$rubrica2_3 + $colum2['rubrica3'];
                    $rubrica2_4=$rubrica2_4 + $colum2['rubrica4'];
                    $rubrica2_5=$rubrica2_5 + $colum2['rubrica5'];
                  }
                  foreach ($pdo->query($sql3) as $colum2){
                    $rubrica3_1=$rubrica3_1 + $colum2['rubrica1'];
                    $rubrica3_2=$rubrica3_2 + $colum2['rubrica2'];
                    $rubrica3_3=$rubrica3_3 + $colum2['rubrica3'];
                    $rubrica3_4=$rubrica3_4 + $colum2['rubrica4'];
                    $rubrica3_5=$rubrica3_5 + $colum2['rubrica5'];
                  }
                  
                  if(($q1->rowCount()==1 && $q2->rowCount()==1 && $q3->rowCount()==1)){
                    $rubrica1=round(($rubrica1_1+$rubrica2_1+$rubrica3_1)/3,2);
                    $rubrica2=round(($rubrica1_2+$rubrica2_2+$rubrica3_2)/3,2);
                    $rubrica3=round(($rubrica1_3+$rubrica2_3+$rubrica3_3)/3,2);
                    $rubrica4=round(($rubrica1_4+$rubrica2_4+$rubrica3_4)/3,2);
                    $rubrica5=round(($rubrica1_5+$rubrica2_5+$rubrica3_5)/3,2);

                  }elseif($q1->rowCount()==1 && $q2->rowCount()==2 && $q3->rowCount()==0){
                    $rubrica1=round(($rubrica1_1+$rubrica2_1)/3,2);
                    $rubrica2=round(($rubrica1_2+$rubrica2_2)/3,2);
                    $rubrica3=round(($rubrica1_3+$rubrica2_3)/3,2);
                    $rubrica4=round(($rubrica1_4+$rubrica2_4)/3,2);
                    $rubrica5=round(($rubrica1_5+$rubrica2_5)/3,2);

                  }elseif($q1->rowCount()==0 && $q2->rowCount()==3 && $q3->rowCount()==0){
                    $rubrica1=round(($rubrica2_1)/3,2);
                    $rubrica2=round(($rubrica2_2)/3,2);
                    $rubrica3=round(($rubrica2_3)/3,2);
                    $rubrica4=round(($rubrica2_4)/3,2);
                    $rubrica5=round(($rubrica2_5)/3,2);

                  }elseif($q1->rowCount()==0 && $q2->rowCount()==2 && $q3->rowCount()==1){
                    $rubrica1=round(($rubrica2_1+$rubrica3_1)/3,2);
                    $rubrica2=round(($rubrica2_2+$rubrica3_2)/3,2);
                    $rubrica3=round(($rubrica2_3+$rubrica3_3)/3,2);
                    $rubrica4=round(($rubrica2_4+$rubrica3_4)/3,2);
                    $rubrica5=round(($rubrica2_5+$rubrica3_5)/3,2);

                  }elseif($q1->rowCount()==0 && $q2->rowCount()==1 && $q3->rowCount()==2){
                    $rubrica1=round(($rubrica2_1+$rubrica3_1)/3,2);
                    $rubrica2=round(($rubrica2_2+$rubrica3_2)/3,2);
                    $rubrica3=round(($rubrica2_3+$rubrica3_3)/3,2);
                    $rubrica4=round(($rubrica2_4+$rubrica3_4)/3,2);
                    $rubrica5=round(($rubrica2_5+$rubrica3_5)/3,2);

                  }elseif($q1->rowCount()==0 && $q2->rowCount()==0 && $q3->rowCount()==3){
                    $rubrica1=round(($rubrica3_1)/3,2);
                    $rubrica2=round(($rubrica3_2)/3,2);
                    $rubrica3=round(($rubrica3_3)/3,2);
                    $rubrica4=round(($rubrica3_4)/3,2);
                    $rubrica5=round(($rubrica3_5)/3,2);

                  }elseif($q1->rowCount()==1 && $q2->rowCount()==0 && $q3->rowCount()==2){
                    $rubrica1=round(($rubrica1_1+$rubrica3_1)/3,2);
                    $rubrica2=round(($rubrica1_2+$rubrica3_2)/3,2);
                    $rubrica3=round(($rubrica1_3+$rubrica3_3)/3,2);
                    $rubrica4=round(($rubrica1_4+$rubrica3_4)/3,2);
                    $rubrica5=round(($rubrica1_5+$rubrica3_5)/3,2);
                  }

                  if (($q1->rowCount() + $q2->rowCount() + $q3->rowCount()) == 3){
                    $promedio = round(($rubrica1 + $rubrica2 + $rubrica3 + $rubrica4 + $rubrica5)/5/4*100,2);
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
                    echo "</div>";
                  }else{
                    if($colum['promedio'] == 0){
                      echo "<div class='card-header card-p1-header bg-warning'>";
                      echo "Autorizado y no calificado";
                      echo "</div>";
                    }else{
                      echo "<div class='card-header card-p1-header bg-success'>";
                      echo "Autorizado y calificado";
                      echo "</div>";
                  }
                  
                  }
                    ?>
                <div class="card-body p1-color">
                  <h5 class="card-title"><?php echo $colum['nombre'];?></h5>
                  <p class="card-text"><?php echo $colum ['descripcion'];?></p>
                  <p class="card-text"><?php if($colum['promedio'] != 0) { ?>
                    <p>PROMEDIO: <?php echo $colum['promedio'];?></p>
                    <p>RUBRICA 1: <?php echo $rubrica1;?>/4</p>
                    <p>RUBRICA 2: <?php echo $rubrica2;?>/4</p>
                    <p>RUBRICA 3: <?php echo $rubrica3;?>/4</p>
                    <p>RUBRICA 4: <?php echo $rubrica4;?>/4</p>
                    <p>RUBRICA 5: <?php echo $rubrica5;?>/4</p>
                  <?php }?></p>
                </div>
                <div class="card-footer">
                  <?php 
                    if($colum['autorizado'] == 1){
                      echo '<a href="verMas_proyecto_estudiante.php?id='.base64_encode($colum['id']).'" class="btn btn-primary btn-p8">Ver más</a>';
                    }else{
                      echo '<a href="verMas_proyecto_estudiante.php?id='.base64_encode($colum['id']).'" class="btn btn-primary btn-p8">Ver más</a>';
                      echo '<a href="editar_proyecto_estudiante.php?id='.base64_encode($colum['id']).'" class="btn btn-primary btn-p8">Editar</a>';
                    }
                  ?>
                </div>
              </div>
              </div>  
            <?php } ?>
  </div>
</div>

</body>
</html>
