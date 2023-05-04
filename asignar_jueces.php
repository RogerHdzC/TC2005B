<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
  $pdo = Database::connect();
  $consulta2 = "SELECT * FROM md1_administrador";
  $consulta3 = "SELECT * FROM md1_proyecto WHERE borrado IS NULL";
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

   <title>Jueces</title>
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
            <li class="nav-item"><a class="nav-link" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="asignar_jueces.php">Asignar Jueces</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_ganadores_admin.php">Ver Ganadores</a></li>
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
      <br>
      <h1>Asignación de Jurado</h1>
      <br>
      <form action="asignar_jueces.php" method="POST" id="signup">
        <input type="submit" class="btn btn-primary btn-jueces" value="Ver jurados actuales" name="actuales">
        <input type="submit" class="btn btn-primary btn-jueces" value="Asignar de manera manual" name="manual">
        </form>
      <br>
      <?php
        if(!isset($_POST['aleatoria']) && !isset($_POST['manual'])){?>
          <div class="container">
            <div class="row">
              <div class="col-6">
                <h1>Proyectos</h1>
              </div>
              <div class="col-6">
                <h1>Jueces</h1>
              </div>
            </div>
            <br>
          <?php foreach ($pdo->query($consulta3) as $colum){?>
            <div class="row">
              <div class="col-6">
                <div class="container">
                  <div class="row">
                    <div class="col-6">
                      <h5 class='card-title'> <?php  echo $colum['nombre']; ?> </h5>
                    </div>
                    <div class="col-6">
                      <a class="btn btn-primary" href="verMas_proyecto_admin.php?id=<?php echo base64_encode($colum['id']);?>">Ver más</a>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="col-6">
                  <div class="container">
                    <div class="row">
                            <?php 
                              $sql1 = 'SELECT * FROM md1_evaluaAdministrador WHERE idProyecto = '.$colum['id'].'';
                              $q1 = $pdo->prepare($sql1);
                              $q1->execute();
            
                              $sql2 ="SELECT * FROM `md1_evaluaJurado` WHERE idProyecto={$colum['id']}";
                              $q2 = $pdo->prepare($sql2);
                              $q2->execute(array());
                              
                              $sql3 ="SELECT * FROM `md1_evaluaDocente` WHERE idProyecto={$colum['id']}";
                              $q3 = $pdo->prepare($sql3);
                              $q3->execute(array());
                              Database::disconnect();

                              if(($q1->rowCount()==1 && $q2->rowCount()==1 && $q3->rowCount()==1)){
                                $data = $q1->fetch(PDO::FETCH_ASSOC);
                                $query = 'SELECT * FROM md1_administrador WHERE correo = ?';
                                $q = $pdo->prepare($query);
                                $q->execute(array($data['idJurado']));
                                $data = $q->fetch(PDO::FETCH_ASSOC);
                                echo '<div class="col-4">';
                                echo "<p>{$data['nombre']}</p>";
                                echo '</div>';

                                $data = $q2->fetch(PDO::FETCH_ASSOC);
                                $query = 'SELECT * FROM md1_jurado WHERE correo = ?';
                                $q = $pdo->prepare($query);
                                $q->execute(array($data['idJurado']));
                                $data = $q->fetch(PDO::FETCH_ASSOC);
                                echo '<div class="col-4">';
                                echo "<p>{$data['nombre']}</p>";
                                echo '</div>';

                                $data = $q3->fetch(PDO::FETCH_ASSOC);
                                $query = 'SELECT * FROM md1_docente WHERE nomina = ?';
                                $q = $pdo->prepare($query);
                                $q->execute(array($data['idJurado']));
                                $data = $q->fetch(PDO::FETCH_ASSOC);
                                echo '<div class="col-4">';
                                echo "<p>{$data['nombre']}</p>";
                                echo '</div>';  
                              }elseif($q1->rowCount()==1 && $q2->rowCount()==2 && $q3->rowCount()==0){
                                $data = $q1->fetch(PDO::FETCH_ASSOC);
                                $query = 'SELECT * FROM md1_administrador WHERE correo = ?';
                                $q = $pdo->prepare($query);
                                $q->execute(array($data['idJurado']));
                                $data = $q->fetch(PDO::FETCH_ASSOC);
                                echo '<div class="col-4">';
                                echo "<p>{$data['nombre']}</p>";
                                echo '</div>';
                                foreach($pdo->query($sql2) as $data){
                                  $query = 'SELECT * FROM md1_jurado WHERE correo = ?';
                                  $q = $pdo->prepare($query);
                                  $q->execute(array($data['idJurado']));
                                  $data = $q->fetch(PDO::FETCH_ASSOC);
                                  echo '<div class="col-4">';
                                  echo "<p>{$data['nombre']}</p>";
                                  echo '</div>';
                                }
                                $data = $q2->fetch(PDO::FETCH_ASSOC);
                                $query = 'SELECT * FROM md1_docente WHERE nomina = ?';
                                $q = $pdo->prepare($query);
                                $q->execute(array($data['idJurado']));
                                $data = $q->fetch(PDO::FETCH_ASSOC);
                                echo '<div class="col-4">';
                                echo "<p>{$data['nombre']}</p>";
                                echo '</div>';
                              }elseif($q1->rowCount()==0 && $q2->rowCount()==3 && $q3->rowCount()==0){
                                foreach($pdo->query($sql2) as $data){
                                  $query = 'SELECT * FROM md1_jurado WHERE correo = ?';
                                  $q = $pdo->prepare($query);
                                  $q->execute(array($data['idJurado']));
                                  $data = $q->fetch(PDO::FETCH_ASSOC);
                                  echo '<div class="col-4">';
                                  echo "<p>{$data['nombre']}</p>";
                                  echo '</div>';
                                }
                              }elseif($q1->rowCount()==0 && $q2->rowCount()==2 && $q3->rowCount()==1){
                                foreach($pdo->query($sql2) as $data){
                                  $query = 'SELECT * FROM md1_jurado WHERE correo = ?';
                                  $q = $pdo->prepare($query);
                                  $q->execute(array($data['idJurado']));
                                  $data = $q->fetch(PDO::FETCH_ASSOC);
                                  echo '<div class="col-4">';
                                  echo "<p>{$data['nombre']}</p>";
                                  echo '</div>';
                                }
                                $data = $q3->fetch(PDO::FETCH_ASSOC);
                                $query = 'SELECT * FROM md1_docente WHERE nomina = ?';
                                $q = $pdo->prepare($query);
                                $q->execute(array($data['idJurado']));
                                $data = $q->fetch(PDO::FETCH_ASSOC);
                                echo '<div class="col-4">';
                                echo "<p>{$data['nombre']}</p>";
                                echo '</div>';  
                              }elseif($q1->rowCount()==0 && $q2->rowCount()==1 && $q3->rowCount()==2){
                                $data = $q2->fetch(PDO::FETCH_ASSOC);
                                $query = 'SELECT * FROM md1_jurado WHERE correo = ?';
                                $q = $pdo->prepare($query);
                                $q->execute(array($data['idJurado']));
                                $data = $q->fetch(PDO::FETCH_ASSOC);
                                echo '<div class="col-4">';
                                echo "<p>{$data['nombre']}</p>";
                                echo '</div>';
                                foreach($pdo->query($sql3) as $data){
                                  $query = 'SELECT * FROM md1_jurado WHERE correo = ?';
                                  $q = $pdo->prepare($query);
                                  $q->execute(array($data['idJurado']));
                                  $data = $q->fetch(PDO::FETCH_ASSOC);
                                  echo '<div class="col-4">';
                                  echo "<p>{$data['nombre']}</p>";
                                  echo '</div>';
                                }
                              }elseif($q1->rowCount()==0 && $q2->rowCount()==0 && $q3->rowCount()==3){
                                foreach($pdo->query($sql3) as $data){
                                  $query = 'SELECT * FROM md1_jurado WHERE correo = ?';
                                  $q = $pdo->prepare($query);
                                  $q->execute(array($data['idJurado']));
                                  $data = $q->fetch(PDO::FETCH_ASSOC);
                                  echo '<div class="col-4">';
                                  echo "<p>{$data['nombre']}</p>";
                                  echo '</div>';
                                }
                              }elseif($q1->rowCount()==1 && $q2->rowCount()==0 && $q3->rowCount()==2){
                                $data = $q1->fetch(PDO::FETCH_ASSOC);
                                $query = 'SELECT * FROM md1_administrador WHERE correo = ?';
                                $q = $pdo->prepare($query);
                                $q->execute(array($data['idJurado']));
                                $data = $q->fetch(PDO::FETCH_ASSOC);
                                echo '<div class="col-4">';
                                echo "<p>{$data['nombre']}</p>";
                                echo '</div>';
                                foreach($pdo->query($sql3) as $data){
                                  $query = 'SELECT * FROM md1_jurado WHERE correo = ?';
                                  $q = $pdo->prepare($query);
                                  $q->execute(array($data['idJurado']));
                                  $data = $q->fetch(PDO::FETCH_ASSOC);
                                  echo '<div class="col-4">';
                                  echo "<p>{$data['nombre']}</p>";
                                  echo '</div>';
                                } 
                              }
                            ?>
                      </div>
                      <br>
                  </div>
              </div> 
            </div>   
            <?php } ?>
          </div>
        <?php }elseif(isset($_POST['aleatoria'])){
          echo "<h1>EN DESARROLLO</h1>";
        }elseif(isset($_POST['manual'])){?>
          <div class="container">
            <div class="row">
              <div class="col-6">
                <h1>PROYECTOS</h1>
              </div>
              <div class="col-6">
                <h1>JURADOS</h1>
              </div>
            </div>
          <?php foreach ($pdo->query($consulta3) as $colum){?>
            <div class="row">
              <div class="col-6">
                <div class="container">
                  <div class="row">
                    <div class="col-6">
                      <h5 class='card-title'> <?php  echo $colum['nombre']; ?> </h5>
                    </div>
                    <div class="col-6">
                      <a class="btn btn-primary" href="verMas_proyecto_admin.php?id=<?php echo $colum['id'];?>">Ver más</a>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="col-6">
                <form action="cargar.php"  method="POST" id="signup" enctype="multipart/form-data">
                  <div class="container">
                    <div class="row">
                      <?php 
                              $sql1 = 'SELECT * FROM md1_evaluaAdministrador WHERE idProyecto = '.$colum['id'].'';
                              $q1 = $pdo->prepare($sql1);
                              $q1->execute();
                              $productos = $q1->fetchAll(PDO::FETCH_OBJ);
                              
                              $sql2 ="SELECT * FROM `md1_evaluaJurado` WHERE idProyecto={$colum['id']}";
                              $q2 = $pdo->prepare($sql2);
                              $q2->execute(array());
                              $productos2 = $q2->fetchAll(PDO::FETCH_OBJ);
                              
                              $sql3 ="SELECT * FROM `md1_evaluaDocente` WHERE idProyecto={$colum['id']}";
                              $q3 = $pdo->prepare($sql3);
                              $q3->execute(array());
                              $productos3 = $q3->fetchAll(PDO::FETCH_OBJ);
                              Database::disconnect();
                              
                              if(($q1->rowCount() + $q2->rowCount() + $q3->rowCount()) == 3){ ?>
                                <?php if(($q1->rowCount() == 1 && $q2->rowCount() == 1 && $q3->rowCount()) == 1) { ?>
                                  <div class="col-3">
                                    <input type="hidden" name="id" value="<?php echo $colum['id']?>"/>
                                    <select class="form-select" aria-label="Default select example" name="califica1" id="nivelInput">
                                    <option selected value="
                                    <?php foreach($productos as $producto){
                                      echo $producto->idJurado;  
                                    ?> 
                                    <?php } ?>
                                    " disabled="disabled">
                                    <?php 
                                    foreach($productos as $producto){
                                      echo $producto->idJurado;  
                                    ?> 
                                    <?php } ?>
                                  </option>
                                      <?php
                                      $pdo = Database::connect();
                                      $uf=$colum['UF'];
                                      $id = $colum['id'];
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                                  echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                  </select>
                                  </div>
                                  <div class="col-3">
                                    <select class="form-select" aria-label="Default select example" name="califica2" id="nivelInput">
                                      <option selected value="
                                      <?php foreach($productos2 as $producto){
                                              echo $producto->idJurado;  
                                            ?> 
                                            <?php } ?>
                                      " disabled="disabled">
                                      <?php 
                                            foreach($productos2 as $producto){
                                              echo $producto->idJurado;  
                                            ?> 
                                            <?php } ?>
                                    </option>
                                      <?php
                                      $pdo = Database::connect();
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                      echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                                  echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                    </select>
                                  </div>
                                  <div class="col-3">
                                    <select class="form-select" aria-label="Default select example" name="califica3" id="nivelInput">
                                      <option selected value="
                                      <?php foreach($productos3 as $producto){
                                              echo $producto->idJurado;  
                                            ?> 
                                            <?php } ?>
                                      " disabled="disabled">
                                      <?php foreach($productos3 as $producto){
                                              echo $producto->idJurado;  
                                            ?> 
                                            <?php } ?>
                                    </option>
                                      <?php
                                      $pdo = Database::connect();
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                    
                                      ?>
                                    </select>
                                  </div>  
                                  <div class="col-3">
                                  <input type="submit" class="btn btn-primary" value="Guardar cambios" name="asignar">
                                  </div>
                                <?php }elseif($q1->rowCount()==1 && $q2->rowCount()==2 && $q3->rowCount()==0){?> 
                                  <div class="col-3">
                                    <input type="hidden" name="id" value="<?php echo $colum['id']?>"/>
                                  <select class="form-select" aria-label="Default select example" name="califica1" id="nivelInput">
                                    <option selected value="
                                    <?php foreach($productos as $producto){
                                      echo $producto->idJurado;  
                                    ?> 
                                    <?php } ?>
                                    " disabled="disabled">
                                    <?php 
                                    foreach($productos as $producto){
                                      echo $producto->idJurado;  
                                    ?> 
                                    <?php } ?>
                                  </option>
                                      <?php
                                      $pdo = Database::connect();
                                      $uf=$colum['UF'];
                                      $id = $colum['id'];
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                                  echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                  </select>
                                  </div>
                                  <?php foreach($productos2 as $producto){ ?>
                                  <div class="col-3">
                                    <select class="form-select" aria-label="Default select example" name="califica2" id="nivelInput">
                                      <option selected value="
                                              <?php echo $producto->idJurado;  
                                            ?> 
                                      " disabled="disabled">
                                      <?php echo $producto->idJurado;?> 
                                          </option>
                                          <?php
                                      $pdo = Database::connect();
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                    </select>
                                  </div> 
                                  <?php } ?>
                                  <div class="col-3">
                                    <input type="submit" class="btn btn-primary" value="Guardar cambios" name="asignar">
                                  </div>
                                <?php }elseif($q1->rowCount()==0 && $q2->rowCount()==3 && $q3->rowCount()==0){?> 
                                  <?php foreach($productos2 as $producto){ ?>
                                    <div class="col-3">
                                    <input type="hidden" name="id" value="<?php echo $colum['id']?>"/>
                                  <select class="form-select" aria-label="Default select example" name="califica1" id="nivelInput">
                                    <option selected value="
                                      <?php echo $producto->idJurado;  ?> " disabled="disabled">
                                    <?php echo $producto->idJurado; ?> 
                                  </option>
                                      <?php
                                      $pdo = Database::connect();
                                      $uf=$colum['UF'];
                                      $id = $colum['id'];
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                                  echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                  </select>
                                  </div>
                                  <?php } ?>
                                  <div class="col-3">
                                    <input type="submit" class="btn btn-primary" value="Guardar cambios" name="asignar">
                                  </div>
                              <?php }elseif($q1->rowCount()==0 && $q2->rowCount()==2 && $q3->rowCount()==1){ ?>
                                    <div class="col-3">
                                    <input type="hidden" name="id" value="<?php echo $colum['id']?>"/>
                                  <select class="form-select" aria-label="Default select example" name="califica1" id="nivelInput">
                                    <option selected value="
                                    <?php foreach($productos3 as $producto){
                                      echo $producto->idJurado;  
                                    ?> 
                                    <?php } ?>
                                    " disabled="disabled">
                                    <?php 
                                    foreach($productos3 as $producto){
                                      echo $producto->idJurado;  
                                    ?> 
                                    <?php } ?>
                                  </option>
                                      <?php
                                      $pdo = Database::connect();
                                      $uf=$colum['UF'];
                                      $id = $colum['id'];
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                                  echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                  </select>
                                  </div>
                                  <?php foreach($productos2 as $producto){ ?>
                                  <div class="col-3">
                                    <select class="form-select" aria-label="Default select example" name="califica2" id="nivelInput">
                                      <option selected value="
                                              <?php echo $producto->idJurado;  
                                            ?> 
                                      " disabled="disabled">
                                      <?php echo $producto->idJurado;?> 
                                          </option>
                                          <?php
                                      $pdo = Database::connect();
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                    </select>
                                  </div> 
                                  <?php } ?>
                                  <div class="col-3">
                                    <input type="submit" class="btn btn-primary" value="Guardar cambios" name="asignar">
                                  </div>
                              <?php }elseif($q1->rowCount()==0 && $q2->rowCount()==1 && $q3->rowCount()==2){ ?>
                                    <div class="col-3">
                                    <input type="hidden" name="id" value="<?php echo $colum['id']?>"/>
                                  <select class="form-select" aria-label="Default select example" name="califica1" id="nivelInput">
                                    <option selected value="
                                    <?php foreach($productos2 as $producto){
                                      echo $producto->idJurado;  
                                    ?> 
                                    <?php } ?>
                                    " disabled="disabled">
                                    <?php 
                                    foreach($productos2 as $producto){
                                      echo $producto->idJurado;  
                                    ?> 
                                    <?php } ?>
                                  </option>
                                      <?php
                                      $pdo = Database::connect();
                                      $uf=$colum['UF'];
                                      $id = $colum['id'];
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                                  echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                  </select>
                                  </div>
                                  <?php foreach($productos3 as $producto){ ?>
                                  <div class="col-3">
                                    <select class="form-select" aria-label="Default select example" name="califica2" id="nivelInput">
                                      <option selected value="
                                              <?php echo $producto->idJurado;  
                                            ?> 
                                      " disabled="disabled">
                                      <?php echo $producto->idJurado;?> 
                                          </option>
                                          <?php
                                      $pdo = Database::connect();
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                    </select>
                                  </div> 
                                  <?php } ?>
                                  <div class="col-3">
                                    <input type="submit" class="btn btn-primary" value="Guardar cambios" name="asignar">
                                  </div>
                              <?php }elseif($q1->rowCount()==0 && $q2->rowCount()==3 && $q3->rowCount()==0){?> 
                                  <?php foreach($productos3 as $producto){ ?>
                                    <div class="col-3">
                                    <input type="hidden" name="id" value="<?php echo $colum['id']?>"/>
                                  <select class="form-select" aria-label="Default select example" name="califica1" id="nivelInput">
                                    <option selected value="
                                      <?php echo $producto->idJurado;  ?> " disabled="disabled">
                                    <?php echo $producto->idJurado; ?> 
                                  </option>
                                      <?php
                                      $pdo = Database::connect();
                                      $uf=$colum['UF'];
                                      $id = $colum['id'];
                                      $query = 'SELECT * FROM md1_jurado';
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                                      foreach ($pdo->query($query) as $row) {
                                                    echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      $query = 'SELECT * FROM md1_administrador';
                                      foreach ($pdo->query($query) as $row) {
                                                  echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                                      }
                                      Database::disconnect();
                                      ?>
                                  </select>
                                  </div>
                                  <?php } ?>
                                  <div class="col-3">
                                    <input type="submit" class="btn btn-primary" value="Guardar cambios" name="asignar">
                                  </div>
                              <?php } ?>
                            <?php  }else{
                            ?>
                            <div class="col-3">
                                    <input type="hidden" name="id" value="<?php echo $colum['id']?>"/>
                          <select class="form-select" aria-label="Default select example" name="califica1" id="nivelInput">
                            
                            <option selected value="" disabled="disabled">Seleccione una Opción</option>
                            <?php
                            $pdo = Database::connect();
                            $uf=$colum['UF'];
                            $id = $colum['id'];
                            $query = 'SELECT * FROM md1_jurado';
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = 'SELECT * FROM md1_administrador';
                            foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            Database::disconnect();
                            ?>
                          </select>
                        </div>
                        <div class="col-3">
                          <select class="form-select" aria-label="Default select example" name="califica2" id="nivelInput">
                            <option selected value="" disabled="disabled">Seleccione una Opción</option>
                            <?php
                            $pdo = Database::connect();
                            $query = 'SELECT * FROM md1_jurado';
                            foreach ($pdo->query($query) as $row) {
                            echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = 'SELECT * FROM md1_administrador';
                            foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            Database::disconnect();
                            ?>
                          </select>
                        </div>
                        <div class="col-3">
                          <select class="form-select" aria-label="Default select example" name="califica3" id="nivelInput">
                            <option selected value="" disabled="disabled">Seleccione una Opción</option>
                            <?php
                            $pdo = Database::connect();
                            $query = 'SELECT * FROM md1_jurado';
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_proyecto as p WHERE d.es_jurado=1 AND p.id={$colum['id']} AND p.correoProfesor!=d.nomina";
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = 'SELECT * FROM md1_administrador';
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            Database::disconnect();
                          
                            ?>
                          </select>
                        </div>  
                        <div class="col-3">
                        <input type="submit" class="btn btn-primary" value="Asignar de manera manual" name="asignar">
                        </div>
                        <?php } ?>
                    </div>
                  </div>
                </form>  
              </div> 
            </div>   
          <?php } ?>
          </div>
        <?php } ?>

        <br>
</body>
</html>

