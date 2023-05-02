<?php
  require_once 'restrictedDocenteJuez.php';
  include 'database.php';

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
    
    <title>Ver más - Proyecto</title>
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
            <li class="nav-item"><a class="nav-link"  href="mis_proyectos_docenteJuez.php">Mis proyectos</a></li>
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
   <h1>Ver más - Proyecto <?php echo $data['nombre']; ?></h1>
   <br></br>
   <div id="popUp-container">
        <div id="explicacion">
            <p id = 'texto'></p>
            <div id="btn-salida">&times;</div>
        </div>
    </div> 

      <div class="container validacion">
         <div class="row">
            <div class="col-6 col-p2-3">
               <div class="container">
                  <div class="row">
                     <div class="separation"></div>
                     <div class="col-6 col-p2-3 names">Nombre del Proyecto:</div>
                     <div class="col-6 col-p2-3">
                     <div class="card">
                           <p class="card-text p1-color"><?php echo $data['nombre'] ?></p>
                     </div>
                     <small></small>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation2"></div>
                        <div class="col-6 col-p2-3 names" >
                           Unidad de Formación: 
                        </div>
                        <div class="col-6 col-p2-3">
                           <div class="card">
                              <p clasS="card-text p1-color"><?php echo $data['UF']?></p>
                           </div>
                           <small></small>
                        </div>
                  </div>
                  <div class="row">
                     <div class="separation questionMark" id="area">&quest;</div>
                     <div class="col-6 col-p2-3 names">
                        Área Estratégica:
                     </div>
                     <div class="col-6 col-p2-3">
                     <div class="card">
                           <p class="card-text p1-color"><?php echo $data['areaEstrategica'] ?></p>
                     </div> 
                        <small></small>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation"></div>
                        <div class="col-6 col-p2-3 names">
                           Edición:
                        </div>
                        <div class="col-6 col-p2-3">
                        <div class="card">
                           <p class="card-text p1-color"><?php echo $data['idEdicion'] ?></p>
                        </div>
                           <small></small>
                        </div>
                  </div>
                  <div class="row">
                     <div class="separation questionMark" id='compañero'>&quest;</div>
                        <div class="col-6 col-p2-3 names">
                           Matrícula Compañero 1:
                        </div>
                        <div class="col-6 col-p2-3">
                        <div class="card">
                           <p class="card-text p1-color"><?php echo $data['correoCompañero1'] ?></p>
                        </div>
                           <small></small>
                        </div>
                  </div>
                  <div class="row">
                     <div class="separation"></div>
                     <div class="col-6 col-p2-3 names">
                           Matrícula Compañero 2:
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="card">
                           <p class="card-text p1-color"><?php echo $data['correoCompañero2'] ?></p>
                        </div>
                           <small></small>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation"></div>
                     <div class="col-6 col-p2-3 names">
                           Matrícula Compañero 3:
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="card">
                           <p class="card-text p1-color"><?php echo $data['correoCompañero3'] ?></p>
                        </div>
                        <small></small>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation"></div>
                     <div class="col-6 col-p2-3 names">
                           Matrícula Compañero 4:
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="card">
                           <p class="card-text p1-color"><?php echo $data['correoCompañero4'] ?></p>
                        </div>
                        <small></small>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-6 col-p2-3">
               <div class="container">
                  <div class="row">
                     <div class="separation2"></div>
                     <div class="col-6 col-p2-3 names">Profesor:</div>
                     <div class="col-6 col-p2-3">
                     <div class="card">
                           <p class="card-text p1-color"><?php echo $data2['nombre'] ?></p>
                        </div>
                        <small></small>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation2 questionMark" id="descrip">&quest;</div>
                     <div class="col-6 col-p2-3 names">
                        Descripción del Proyecto:
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="card h-100">
                           <p class="card-text p1-color"><?php echo $data['descripcion'];?></p>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="separation2 questionMark" id="nivel">&quest;</div>
                        <div class="col-6 col-p2-3 names">
                           Nivel de Desarrollo:
                        </div>
                        <div class="col-6 col-p2-3">
                           <div class="card">
                              <p class="card-text p1-color"><?php echo $data['nivel'] ?></p>
                           </div>
                           <small></small>
                        </div>
                  </div>
                  <div class="row">
                     <div class="separation2 questionMark" id="video">&quest;</div>
                     <div class="col-6 col-p2-3 names">
                        Video (URL): 
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="card">
                           <a href="<?php echo $data['video'] ?>" target="_blank" rel="noopener noreferrer">VIDEO</a>
                           <small></small>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation2"></div>
                     <div class="col-6 col-p2-3 names">
                        Póster (URL): 
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="card">
                           <a href="<?php echo $data['pdf'] ?>" target="_blank" rel="noopener noreferrer">POSTER</a>
                           <small></small>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation2"></div>
                     <div class="col-6 col-p2-3 names">Tiene Componente de Emprendimiento:</div>
                     <div class="col-6 col-p2-3">
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
               </div>
            </div>
         </div>
      </div>
      <!-- SCRIPTS -->
      <script src="js/registro_proyectos.js"></script>      
</body>
</html>