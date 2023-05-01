<?php
  require_once 'restrictedEstudiante.php';
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
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
   <link href="css/general.css" rel="stylesheet">

   
   <title>Ver más - Proyecto</title>
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
              <li class="nav-item"><a class="nav-link" href="mis_proyectos_Estudiante.php">Mis proyectos</a></li>
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
   <h1>Ver más - Proyecto <?php echo $data['nombre']; ?></h1>
   <div class="container">
      <div class="row">
         <div class="col-4">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h2>Descripción</h2>
                  </div>
                  <div class="col-12">
                     <div class="card h-100">
                        <div class="card-body p1-color">
                           <p class="card-text"><?php echo $data['descripcion'];?></p>
                        </div>
                     </div>   
                  </div>
               </div>
            </div>
         </div>

         <div class="col-4">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h2>Area estratégica</h2>
                  </div>
                  <div class="col-12">
                     <div class="card">
                           <p class="card-text p1-color"><?php echo $data['areaEstrategica'] ?></p>
                     </div>     
                  </div>
                  <div class="col-12">
                     <h2>¿Tiene componente de Emprendimiento?</h2>
                  </div>
                  <div class="col-12">
                     <div class="card">
                        <p class="card-text p1-color"> 
                           <?php 
                           if ($data['componeteDeEmprendimiento'] == 1){
                              echo "Si";
                           }else{
                              echo "No";
                           } ?>
                        </p>
                     </div>
                  </div>
                  <div class="col-12">
                     <h2>URL del Poster</h2>
                  </div>
                  <div class="col-12">
                     <div class="card">
                     <a href="<?php echo $data['pdf'] ?>" target="_blank" rel="noopener noreferrer">POSTER</a>
                     </div>
                  </div>  
               </div>
            </div>
         </div>
         
         <div class="col-4">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h2>Nivel de desarrollo</h2>
                  </div>
                  <div class="col-12">
                     <div class="card">
                           <p class="card-text p1-color"><?php echo $data['nivel'] ?></p>
                     </div>     
                  </div> 
                  <div class="col-12">
                     <h2>UF del Proyecto</h2>
                  </div>
                  <div class="col-12">
                     <div class="card">
                        <p clasS="card-text p1-color"><?php echo $data['UF']?></p>
                     </div>
                  </div>
                  <div class="col-12">
                     <h2>URL del Video</h2>
                  </div> 
                  <div class="col-12">
                     <div class="card">
                        <a href="<?php echo $data['video'] ?>" target="_blank" rel="noopener noreferrer">VIDEO</a>
                     </div>
                  </div> 
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-4">
            <h2>Docente a cargo</h2>
         </div>  
         <div class="col-4">
            <h2>Correo del Docente</h2>
         </div>  
      </div>
      <div class="row">
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color"><?php echo $data2['nombre'] ?></p>
            </div>
         </div>
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color"><?php echo $data['correoProfesor'].'@tec.mx' ?></p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-4">
            <h2>Nombre del líder</h2>
         </div>
         <div class="col-4">
            <h2>Correo del líder</h2>
         </div> 
      </div>
      <div class="row">
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color">
                  <?php 
                     $pdo = Database::connect();
                     $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                     $q3 = $pdo->prepare($sql3);
                     $q3->execute(array($data['correoLider']));
                     $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                     Database::disconnect();
                     echo $data3['nombre']; 
                  ?>
               </p>
            </div>
         </div>
         <div class="col-4">
            <div class="card">
               <p clasS="card-text p1-color"><?php echo $data['correoLider'].'@tex.mx'?></p>
            </div>
         </div>
      </div>
      <?php if ($data['correoCompañero1'] != NULL){?> 
      <div class="row">
         <div class="col-4">
            <h2>Nombre de compañer@</h2>
         </div>
         <div class="col-4">
            <h2>Correo de compañer@</h2>            
         </div>
      </div>
      <div class="row">
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color">
                  <?php 
                     $pdo = Database::connect();
                        $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                        $q3 = $pdo->prepare($sql3);
                        $q3->execute(array($data['correoCompañero1']));
                        $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                        Database::disconnect();
                     echo $data3['nombre'];
                  ?>
               </p>
            </div>
         </div>
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color">
                  <?php echo $data['correoCompañero1']."@tec.mx" ?>
               </p>
            </div>
         </div>
      </div>
      <?php }?>
      <?php if ($data['correoCompañero2'] != NULL){?> 
      <div class="row">
         <div class="col-4">
            <h2>Nombre de compañer@</h2>
         </div>
         <div class="col-4">
            <h2>Correo de compañer@</h2>            
         </div>
      </div>
      <div class="row">
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color">
                  <?php 
                     $pdo = Database::connect();
                        $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                        $q3 = $pdo->prepare($sql3);
                        $q3->execute(array($data['correoCompañero2']));
                        $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                        Database::disconnect();
                     echo $data3['nombre'];
                  ?>
               </p>
            </div>
         </div>
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color">
                  <?php echo $data['correoCompañero2']."@tec.mx" ?>
               </p>
            </div>
         </div>
      </div>
      <?php }?>
      <?php if ($data['correoCompañero3'] != NULL){?> 
      <div class="row">
         <div class="col-4">
            <h2>Nombre de compañer@</h2>
         </div>
         <div class="col-4">
            <h2>Correo de compañer@</h2>            
         </div>
      </div>
      <div class="row">
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color">
                  <?php 
                     $pdo = Database::connect();
                        $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                        $q3 = $pdo->prepare($sql3);
                        $q3->execute(array($data['correoCompañero3']));
                        $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                        Database::disconnect();
                     echo $data3['nombre'];
                  ?>
               </p>
            </div>
         </div>
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color">
                  <?php echo $data['correoCompañero3']."@tec.mx" ?>
               </p>
            </div>
         </div>
      </div>
      <?php }?>
      <?php if ($data['correoCompañero4'] != NULL){?> 
      <div class="row">
         <div class="col-4">
            <h2>Nombre de compañer@</h2>
         </div>
         <div class="col-4">
            <h2>Correo de compañer@</h2>            
         </div>
      </div>
      <div class="row">
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color">
                  <?php 
                     $pdo = Database::connect();
                        $sql3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                        $q3 = $pdo->prepare($sql3);
                        $q3->execute(array($data['correoCompañero4']));
                        $data3 = $q3->fetch(PDO::FETCH_ASSOC);
                        Database::disconnect();
                     echo $data3['nombre'];
                  ?>
               </p>
            </div>
         </div>
         <div class="col-4">
            <div class="card">
               <p class="card-text p1-color">
                  <?php echo $data['correoCompañero4']."@tec.mx" ?>
               </p>
            </div>
         </div>
      </div>
      <?php }?>
   </div>
                  
</body>
</html>