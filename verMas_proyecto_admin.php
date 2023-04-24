<?php
  require_once 'restrictedAdmin.php';
  require 'database.php';
  $id = 0;
  if ( !empty($_GET['id'])) {
   $id = base64_decode($_REQUEST['id']);
  }
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM md1_proyecto WHERE id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();

  $pdo = Database::connect();
  $sql2 = 'SELECT * FROM md1_docente WHERE nomina = ? ';
  $q2 = $pdo->prepare($sql2);
  $q2->execute(array($data['correoProfesor']));
  $data2 = $q2->fetch(PDO::FETCH_ASSOC);
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
   <link href="css/verMasProyecto.css" rel="stylesheet">

   <!-- JS-->
   <title>Ver más - Proyecto</title>
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
              <li class="nav-item-admin"><a class="nav-link" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
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
<form>
<br>   
<h1>Ver más - Proyecto </h1>
   
   <div class="container">
         <div class="row">
                 <div class='col-3 col-p2-3'>
                 Nombre del Proyecto:
                 </div>
                 <div class='col-3 col-p2-3'>
                 <?php echo $data['nombre']; ?>
                 </div>
                 <div class='col-3 col-p2-3'>
                 Profesor: 
                 </div>
                 <div class='col-3 col-p2-3'>
                 <div class='mb-3'>
                  <?php echo $data2['nombre']; ?>
                   </div>
                  </div>
                  </div>
                  <div class='row'>
                  <div class='col-3 col-p2-3'>
                  Categoría
                  </div>
                  <div class='col-3 col-p2-3'>
                  <div class='mb-3'>
                  <?php echo $data['categoria']; ?>
                   </div>
                  </div>
                     </div>
                     <div class='row'>
                        <div class='col-3 col-p2-3'>
                           Área Estratégica
                        </div>
                        <div class='col-3 col-p2-3'>
                           <div class='mb-3'>
                  <?php echo $data['areaEstrategica']; ?>
                  </div>
              </div>
              <div class='col-3 col-p2-3'>
                 Descripción del Proyecto
              </div>
              <div class='col-3 col-p2-3'>
                 <div class='input-group'>
                  <?php  echo $data['descripcion'];  ?>
                    
                  </div>
               </div>
            </div>
            <br>
            <div class='row'>
               <div class='col-3 col-p2-3'>
                  Nombre de la UF:
               </div>
               <div class='col-3 col-p2-3'>
               <?php echo $data['UF']; ?>

              </div>
              <div class="col-3 col-p2-3">
                 Nivel de Desarrollo:
              </div>
              <div class="col-3 col-p2-3">
                  <?php echo $data['nivel']; ?>
              </div>
           </div>
           <br>
           <div class="row">
              <div class="col-3 col-p2-3">
                 Correo del lider
              </div>
              <div class="col-3 col-p2-3">
                 <div class="input-group mb-3">
                 <?php 
                 
                 $pdo = Database::connect();
                  $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                  $q3 = $pdo->prepare($sql3);
                  $q3->execute(array($data['correoLider']));
                  $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                  Database::disconnect();

                 echo $data3['nombre']; 
                 ?>                  </div>
              </div>
              <div class="col-3 col-p2-3"></div>
               <div class="col-3 col-p2-3"></div>
         </div>
           <div class="row">
           <?php if ($data['correoCompañero1'] != NULL){?>
               <div class="col-3 col-p2-3">
                  Correo de Compañero
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                  <?php 
                  $pdo = Database::connect();
                   $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                   $q3 = $pdo->prepare($sql3);
                   $q3->execute(array($data['correoCompañero1']));
                   $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                   Database::disconnect();
                  echo $data3['nombre']; 
                  ?>
                   </div>
               </div>
            <?php }else{ ?>
               <div class="col-3 col-p2-3">
                  Componente de Emprendimiento: 
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                  <?php 
                  if ($data['componeteDeEmprendimiento'] == 1){
                        echo "Si";
                  }else{
                     echo "No";
                  } ?>
                   </div>
               </div>
            <?php } ?>
              <div class="col-3 col-p2-3 names">
                  Subir Video (URL): 
               </div>
               <div class="col-3 col-p2-3">
                  <div class="mb-3">
                     <a href="<?php echo $data['video'] ?>" target="_blank" rel="noopener noreferrer">VIDEO</a>
                     <small></small>
                  </div>
               </div>
              
               <div class="col-3 col-p2-3"></div>
         </div>
           <div class="row">
           <?php if ($data['correoCompañero2'] != NULL){?>
               <div class="col-3 col-p2-3">
                  Correo de Compañero
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                  <?php 
                  $pdo = Database::connect();
                   $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                   $q3 = $pdo->prepare($sql3);
                   $q3->execute(array($data['correoCompañero2']));
                   $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                   Database::disconnect();
                  echo $data3['nombre']; 
                  ?>
                   </div>
               </div>
            <?php }elseif ($data['correoCompañero1'] != NULL) { ?>
               <div class="col-3 col-p2-3">
                  Componente de Emprendimiento: 
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                  <?php 
                  if ($data['componeteDeEmprendimiento'] == 1){
                        echo "Si";
                  }else{
                     echo "No";
                  } ?>
                   </div>
               </div>
            <?php }else{ ?>
               <div class="col-3 col-p2-3">
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                   </div>
               </div>
            <?php } ?>
              <div class="col-3 col-p2-3 names">
                  Subir Poster (URL): 
               </div>
               <div class="col-3 col-p2-3">
                  <div class="mb-3">
                     <a href="<?php echo $data['pdf'] ?>" target="_blank" rel="noopener noreferrer">POSTER</a>
                  <small></small>
                  </div>
               </div>
         </div>
              <div class="row">
              <?php if ($data['correoCompañero3'] != NULL){?>
               <div class="col-3 col-p2-3">
                  Correo de Compañero
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                  <?php 
                  $pdo = Database::connect();
                   $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                   $q3 = $pdo->prepare($sql3);
                   $q3->execute(array($data['correoCompañero3']));
                   $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                   Database::disconnect();
                  echo $data3['nombre']; 
                  ?>
                   </div>
               </div>
            <?php }elseif (($data['correoCompañero2'] != NULL) && ($data['correoCompañero2'] != NULL) ) { ?>
               <div class="col-3 col-p2-3">
                  Componente de Emprendimiento: 
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                  <?php 
                  if ($data['componeteDeEmprendimiento'] == 1){
                        echo "Si";
                  }else{
                     echo "No";
                  } ?>
                   </div>
               </div>
            <?php }else{ ?>
               <div class="col-3 col-p2-3">
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                   </div>
               </div>
            <?php } ?>
           <div class="row">
           <?php if ($data['correoCompañero4'] != NULL){?>
               <div class="col-3 col-p2-3">
                  Correo de Compañero
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                  <?php 
                  $pdo = Database::connect();
                   $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                   $q3 = $pdo->prepare($sql3);
                   $q3->execute(array($data['correoCompañero4']));
                   $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                   Database::disconnect();
                  echo $data3['nombre']; 
                  ?>
                   </div>
               </div>
            <?php }elseif (($data['correoCompañero2'] != NULL) && ($data['correoCompañero2'] != NULL) && ($data['correoCompañero3'] != NULL) ) { ?>
               <div class="col-3 col-p2-3">
                  Componente de Emprendimiento: 
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                  <?php 
                  if ($data['componeteDeEmprendimiento'] == 1){
                        echo "Si";
                  }else{
                     echo "No";
                  } ?>
                   </div>
               </div>
            <?php }else{ ?>
               <div class="col-3 col-p2-3">
               </div>
               <div class="col-3 col-p2-3">
                  <div class="input-group mb-3">
                   </div>
               </div>
            <?php } ?>
           <div class="row">
            <?php if(($data['correoCompañero2'] != NULL) && ($data['correoCompañero2'] != NULL) && ($data['correoCompañero3'] != NULL) && ($data['correoCompañero4'] != NULL)){ ?>
               <div class="col-9 col-p1-9">
                 Tiene Componente de Emprendimiento
              </div>
           </div>
           <div class="row">
              <div class="col-9 col-p1-9">
                 <?php 
                  if ($data['componeteDeEmprendimiento'] == 1){
                        echo "Si";
                  }else{
                     echo "No";
                  } ?>
              </div>
              </div>
            </div>

            <?php }else{ ?>
            </div>
            </div>
         <?php } ?>
                  
</body>
</html>