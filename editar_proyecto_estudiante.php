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
   $sql2 = 'SELECT * FROM md1_docente WHERE nomina = ?';
   $q2 = $pdo->prepare($sql2);
   $q2->execute(array($data['correoProfesor']));
   $data2 = $q2->fetch(PDO::FETCH_ASSOC);
   Database::disconnect();

   $pdo = Database::connect();
   $sql3 = 'SELECT * FROM md1_uf WHERE clave = ? ';
   $q3 = $pdo->prepare($sql3);
   $q3->execute(array($data['UF']));
   $data3 = $q3->fetch(PDO::FETCH_ASSOC);
   Database::disconnect();

   $pdo = Database::connect();
   $sql4 = 'SELECT * FROM md1_edicion WHERE id = ? ';
   $q4 = $pdo->prepare($sql4);
   $q4->execute(array($data['idEdicion']));
   $data4 = $q4->fetch(PDO::FETCH_ASSOC);
   Database::disconnect();

   $pdo = Database::connect();
   $lider = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
   $q5 = $pdo->prepare($lider);
   $q5->execute(array($data['correoLider']));
   $data5 = $q5->fetch(PDO::FETCH_ASSOC);
   Database::disconnect();

   $pdo = Database::connect();
   $compañero1 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
   $q6 = $pdo->prepare($compañero1);
   $q6->execute(array($data['correoCompañero1']));
   $data6 = $q6->fetch(PDO::FETCH_ASSOC);
   Database::disconnect();

   $pdo = Database::connect();
   $compañero2 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
   $q7 = $pdo->prepare($compañero2);
   $q7->execute(array($data['correoCompañero2']));
   $data7 = $q7->fetch(PDO::FETCH_ASSOC);
   Database::disconnect();

   $pdo = Database::connect();
   $compañero3 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
   $q8 = $pdo->prepare($compañero3);
   $q8->execute(array($data['correoCompañero3']));
   $data8 = $q8->fetch(PDO::FETCH_ASSOC);
   Database::disconnect();

   $pdo = Database::connect();
   $compañero4 = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
   $q9 = $pdo->prepare($compañero4);
   $q9->execute(array($data['correoCompañero4']));
   $data9 = $q9->fetch(PDO::FETCH_ASSOC);
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

   <!-- Sweet Alert -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- JS-->
   <title>Editar Proyecto</title>
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
          <li class="nav-item"><a class="nav-link" href="mis_proyectos_Estudiante.php">Mis Proyectos</a></li>
          <li class="nav-item"><a class="nav-link" href="explorar_proyectos_estudiante.php">Explorar Proyectos</a></li>
          <li class="nav-item"><a class="nav-link" href="ver_layout_estudiante.php">Ver Mapa</a></li>
          <li class="nav-item"><a class="nav-link" href="resultados_estudiante.php">Resultados</a></li>
          <li class="nav-item"><a class="nav-link" href="ver_ganadores_estudiante.php">Ver Ganadores</a></li>
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
  
    <form action="respuesta_registro_proyecto.php?id=<?php echo $id;?>"  method="POST" id="signup" enctype="multipart/form-data">
   <br>
   <h1>Registrar Proyecto</h1>
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
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nombre" id="nombre_pro" value="<?php echo $data['nombre']; ?>">
                           <small></small>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation2"></div>
                        <div class="col-6 col-p2-3 names" >
                           Unidad de Formación: 
                        </div>
                        <div class="col-6 col-p2-3">
                           <div class="input-group mb-3">
                           <select class="form-select" aria-label="Default select example" name ="uf" id="nombreUf" >
                     <option value='<?php echo $data['UF'] ?>' selected><?php echo $data3['nombre'] ?></option>
                                 <?php
                                 $pdo = Database::connect();
                                 $query = 'SELECT * FROM md1_uf';
                                 foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['clave'] . "'>" . $row['nombre'] . "</option>";

                                 }
                                 Database::disconnect();
                           ?>
                  </select>
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
                        <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="area" id="areaInput">
                     <option selected value="<?php echo $data['areaEstrategica'] ?>"><?php echo $data['areaEstrategica'] ?></option>
                     <option value="Nano">Nano</option>
                     <option value="Bio">Bio</option>
                     <option value="Nexus">Nexus</option>
                     <option value="Cyber">Cyber</option>
                   </select>
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
                           <div class="input-group mb-3">
                           <select class="form-select" aria-label="Default select example" name ="edicion" id="edicion" >
               <option value='<?php echo $data['idEdicion']; ?>' selected><?php echo $data4['fechaInicio']; ?></option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM md1_edicion';
			 				   		foreach ($pdo->query($query) as $row) {
		                        			echo "<option value='" . $row['id'] . "'>" . $row['fechaInicio'] . "</option>";

			   						}
			   						Database::disconnect();
			  					?>
               </select>
                           </div>
                           <small></small>
                        </div>
                  </div>
                  <div class="row">
                     <div class="separation questionMark" id='compañero'>&quest;</div>
                        <div class="col-6 col-p2-3 names">
                           Matrícula de Compañer@:
                        </div>
                        <div class="col-6 col-p2-3">
                           <div class="input-group mb-3">
                           <input type="text" class="form-control" placeholder="Username" id="Comp1" aria-label="Username" name="compañero1" value="<?php if (($data['correoCompañero1'] == NULL) || ($data6['borrado'] == 1)){
                     echo NULL;
                  }else{
                     echo $data['correoCompañero1'];
                     } ?>">                           </div>
                           <small></small>
                        </div>
                  </div>
                  <div class="row">
                     <div class="separation"></div>
                     <div class="col-6 col-p2-3 names">
                        Matrícula de Compañer@:
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" id="Comp2" aria-label="Username" name="compañero2" value="<?php if (($data['correoCompañero2']==NULL) || ($data7['borrado'] == 1)){
                     echo NULL;
                  }else{
                     echo $data['correoCompañero2'];
                     } ?>">
                        </div>
                           <small></small>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation"></div>
                     <div class="col-6 col-p2-3 names">
                     Matrícula de Compañer@:
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" id="Comp3" name="compañero3" value="<?php if (($data['correoCompañero3']==NULL) || ($data8['borrado'] == 1)){
                     echo NULL;
                  }else{
                     echo $data['correoCompañero3'];
                     } ?>">
                        </div>
                        <small></small>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation"></div>
                     <div class="col-6 col-p2-3 names">
                       Matrícula de Compañer@:
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" id="Comp4" name="compañero4" value="<?php if (($data['correoCompañero4']==NULL) || ($data9['borrado'] == 1)){
                     echo NULL;
                        }else{
                           echo $data['correoCompañero4'];
                           } ?>">
                        </div>
                        <small></small>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation"></div>
                     <div class="col-6 col-p2-3 names">
                       Matrícula de Lider:
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" id="Lid" name="correoLider" value="<?php if (($data['correoLider']==NULL) || ($data5['borrado'] == 1)){
                     echo NULL;
                  }else{
                     echo $data['correoLider'];
                     } ?>">
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
                        <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" name ="profesor" id="nombreProfesor" >
               <option value='<?php 
               if($data2['borrado'] == 1){
                  echo NULL; ?>' selected><?php echo NULL ?></option>
               <?php }else{
                  echo $data['correoProfesor']; ?>' selected><?php echo $data2['nombre'] ?></option>
               <?php } ?>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM md1_docente WHERE borrado IS NULL';
			 				   		foreach ($pdo->query($query) as $row) {
		                        			echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";

			   						}
			   						Database::disconnect();
			  					?>
               </select>
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
                        <div class="input-group">
                        <span class="input-group-text"></span>
                  <textarea class="form-control" aria-label="With textarea" name="descripcion" id="descripInput"><?php echo $data['descripcion']; ?></textarea>
                        </div>
                        <small></small>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation2 questionMark" id="nivel">&quest;</div>
                        <div class="col-6 col-p2-3 names">
                           Nivel de Desarrollo:
                        </div>
                        <div class="col-6 col-p2-3">
                           <div class="mb-3">
                           <select class="form-select" aria-label="Default select example" name="nivel" id="nivelInput">
                  <option selected value="<?php echo $data['nivel'] ?>"><?php echo $data['nivel'] ?></option>
                  <option value="Concepto">Concepto</option>
                  <option value="Prototipo">Prototipo</option>
                  <option value="Terminado">Producto Terminado</option>
                </select>
                           </div>
                           <small></small>
                        </div>
                  </div>
                  <div class="row">
                     <div class="separation2 questionMark" id="video">&quest;</div>
                     <div class="col-6 col-p2-3 names">
                        Subir Video (URL): 
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="mb-3">
                           <input type="text" class="form-control" name="video" id="videoInput" value="<?php echo $data['video'] ?>">
                           <small></small>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="separation2"></div>
                     <div class="col-6 col-p2-3 names">
                        Subir Póster (URL): 
                     </div>
                     <div class="col-6 col-p2-3">
                        <div class="mb-3">
                           <input class="form-control" type="text" name="pdf" id="posterInput" value="<?php echo $data['pdf'] ?>" >
                           <small></small>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6 col-p1-14 names1">
                        Tiene Componente de Emprendimiento:
                     </div>
                     <?php if($data['componeteDeEmprendimiento']==1){?>
                     <div class="col-6 radioOpts">
                        <div class="form-check form-check-inline" id="radios">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" checked>
                              <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
                           <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                     </div>
                     <small></small>
                     <?php }else{?>
                     <div class="col-6 radioOpts">
                        <div class="form-check form-check-inline" id="radios">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                              <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" checked>
                           <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                     </div>
                     <small></small>
                     <?php  
               } ?>
               </div>
                  <div class="row">
                     <div class="col">
                        <br>
                        <button type="submit" name="guardarCambios" id="guardarCambios" class="btn btn-primary btn-custom btn-p1" >Guardar cambios</button>
                        <br></br>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      </form>

   <script src="js/registro_proyectos.js"></script>
   <script src="js/validacion_edicion.js"></script>
   
</body>
</html>