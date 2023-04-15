<?php
  require_once 'restrictedDocenteJuez.php';
  include 'database.php';

  $id = 0;
  if ( !empty($_GET['id'])) {
     $id = $_REQUEST['id'];
  }

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
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql3 = "SELECT * FROM md1_proyecto WHERE id = ?";
  $q3 = $pdo->prepare($sql3);
  $q3->execute(array($id));
  $data3 = $q3->fetch(PDO::FETCH_ASSOC);
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
            <?php if($data2['correo']!= $_SESSION['docente']){?>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="mis_proyectos_docenteJuez.php">Mis proyectos</a></li>
            <?php }?>
            <li class="nav-item-docenJuez"><a class="nav-link"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
            <?php if(($data['es_jurado']==1) || ($data2['correo']== $_SESSION['docente'])){?>
              <li class="nav-item-docenJuez"><a class="nav-link"  href="proyectosa_calificar.php">Proyectos a Calificar</a></li>
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
<form>
   <br>
   <h1>Ver más - Proyecto</h1>
   <br></br>
   <div class="container">
         <div class="row">
                 <div class='col-3 col-p2-3'>
                 Nombre del Proyecto:
                 </div>
                 <div class='col-3 col-p2-3'>
                 <?php echo $data3['nombre']; ?>
                 </div>
                 <div class='col-3 col-p2-3'>
                 Profesor: 
                 </div>
                 <div class='col-3 col-p2-3'>
                 <div class='mb-3'>
                  <?php echo $data['nombre']; ?>
                   </div>
                  </div>
                  </div>
                  <div class='row'>
                  <div class='col-3 col-p2-3'>
                  Categoría
                  </div>
                  <div class='col-3 col-p2-3'>
                  <div class='mb-3'>
                  <?php echo $data3['categoria']; ?>
                   </div>
                  </div>
                     </div>
                     <div class='row'>
                        <div class='col-3 col-p2-3'>
                           Área Estratégica
                        </div>
                        <div class='col-3 col-p2-3'>
                           <div class='mb-3'>
                  <?php echo $data3['areaEstrategica']; ?>
                  </div>
              </div>
              <div class='col-3 col-p2-3'>
                 Descripción del Proyecto
              </div>
              <div class='col-3 col-p2-3'>
                 <div class='input-group'>
                  <?php  echo $data3['descripcion'];  ?>
                    
                  </div>
               </div>
            </div>
            <br>
            <div class='row'>
               <div class='col-3 col-p2-3'>
                  Nombre de la UF:
               </div>
               <div class='col-3 col-p2-3'>
               <?php echo $data3['UF']; ?>

              </div>
              <div class="col-3 col-p2-3">
                 Nivel de Desarrollo:
              </div>
              <div class="col-3 col-p2-3">
                  <?php echo $data3['nivel']; ?>
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
                  $sql4 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                  $q4 = $pdo->prepare($sql4);
                  $q4->execute(array($data3['correoLider']));
                  $data4 = $q4->fetch(PDO::FETCH_ASSOC);
                  Database::disconnect();

                 echo $data4['nombre']; 
                 ?>                  </div>
              </div>
              <div class="col-3 col-p2-3"></div>
               <div class="col-3 col-p2-3"></div>
         </div>
           <div class="row">
            <?php if ($data3['correoCompañero1'] != NULL){?>
              <div class="col-3 col-p2-3">
                 Correo de Compañero
              </div>
              <div class="col-3 col-p2-3">
                 <div class="input-group mb-3">
                 <?php 
                 
                 $pdo = Database::connect();
                  $sql4 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                  $q4 = $pdo->prepare($sql4);
                  $q4->execute(array($data3['correoCompañero1']));
                  $data4 = $q4->fetch(PDO::FETCH_ASSOC);
                  Database::disconnect();

                 echo $data4['nombre']; 
                 ?>
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
                  Subir Video (URL): 
               </div>
               <div class="col-3 col-p2-3">
                  <div class="mb-3">
                     <a href="<?php echo $data3['video'] ?>">VIDEO</a>
                     <small></small>
                  </div>
               </div>
              
               <div class="col-3 col-p2-3"></div>
         </div>
           <div class="row">
           <?php if ($data3['correoCompañero1'] != NULL){?>
              <div class="col-3 col-p2-3">
                 Correo de Compañero
              </div>
              <div class="col-3 col-p2-3">
                 <div class="input-group mb-3">
                 <?php 
                 
                 $pdo = Database::connect();
                  $sql4 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                  $q4 = $pdo->prepare($sql4);
                  $q4->execute(array($data3['correoCompañero2']));
                  $data4 = $q4->fetch(PDO::FETCH_ASSOC);
                  Database::disconnect();

                 echo $data4['nombre']; 
                 ?>
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
                     <a href="<?php echo $data3['pdf'] ?>">POSTER</a>
                  <small></small>
                  </div>
               </div>
         </div>
              <div class="row">
              <?php if ($data3['correoCompañero1'] != NULL){?>
              <div class="col-3 col-p2-3">
                 Correo de Compañero
              </div>
              <div class="col-3 col-p2-3">
                 <div class="input-group mb-3">
                 <?php 
                 
                 $pdo = Database::connect();
                  $sql4 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                  $q4 = $pdo->prepare($sql4);
                  $q4->execute(array($data3['correoCompañero1']));
                  $data4 = $q4->fetch(PDO::FETCH_ASSOC);
                  Database::disconnect();

                 echo $data4['nombre']; 
                 ?>
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
               <div class="col-3 col-p2-3"></div>
               <div class="col-3 col-p2-3"></div>
         </div> 
           <div class="row">
           <?php if ($data3['correoCompañero1'] != NULL){?>
              <div class="col-3 col-p2-3">
                 Correo de Compañero
              </div>
              <div class="col-3 col-p2-3">
                 <div class="input-group mb-3">
                 <?php 
                 
                 $pdo = Database::connect();
                  $sql4 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
                  $q4 = $pdo->prepare($sql4);
                  $q4->execute(array($data3['correoCompañero1']));
                  $data4 = $q4->fetch(PDO::FETCH_ASSOC);
                  Database::disconnect();

                 echo $data4['nombre']; 
                 ?>
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
           </div>
           <div class="row">
              <div class="col-9 col-p1-9">
                 Tiene Componente de Emprendimiento
              </div>
           </div>
           <div class="row">
              <div class="col-9 col-p1-9">
                 <?php 
                  if ($data3['componeteDeEmprendimiento'] == 1){
                        echo "Si";
                  }else{
                     echo "No";
                  } ?>
              </div>
              </div>                  


      </div>
</body>
</html>