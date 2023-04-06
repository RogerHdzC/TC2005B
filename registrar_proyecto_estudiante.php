<?php
  require_once 'restrictedEstudiante.php';
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
   <link href="css/registrarProyectoEstudiante.css" rel="stylesheet">

   <!-- JS-->
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
              <li class="nav-item"><a class="nav-link" href="pagina_inicio_estudiantes.php">Inicio</a></li>
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="registrar_proyecto_estudiante.php">Registrar Proyectos</a></li>
              <li class="nav-item"><a class="nav-link" href="mis_proyectos_Estudiante.php">Mis proyectos</a></li>
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
  
<form>
   <br>
   <h1>Registrar Proyecto</h1>
   <br></br>

   <div id="popUp-container">
        <div id="explicacion">
            <p id = 'texto'></p>
            <div id="btn-salida">&times;</div>
        </div>
    </div> 

      <div class="container">
      
         <div class="row">
         <div class="separation"></div>
            <div class="col-3 col-p2-3 names">
               Nombre del Proyecto: 
            </div>
            <div class="col-3 col-p2-3">
               <input type="text" class="form-control" required>
            </div>
            <div class="separation2"></div>
            <div class="col-3 col-p2-3 names" >
               Profesor: 
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <input type="text" class="form-control" id="formGroupExampleInput" required>
                </div>
            </div>
         </div>
         <div class="row">
         <div class="separation questionMark" id="area">&quest;</div>
         <div class="col-3 col-p2-3 names">
               Área Estratégica:
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <select class="form-select" aria-label="Default select example" required>
                     <option selected>Seleccione una Opción</option>
                     <option value="1">Nano</option>
                     <option value="2">Bio</option>
                     <option value="3">Nexus</option>
                     <option value="4">Cyber</option>
                   </select>
                </div>
            </div>
            <div class="separation2"></div>
            <div class="col-3 col-p2-3 names">
               Correo del Profesor:
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username" required>
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" placeholder="Server" aria-label="Server" required>
                </div>
            </div>
         </div>
         <div class="row">
         <div class="separation"></div>
         <div class="col-3 col-p2-3 names">
               Nombre de la UF:
            </div>
            <div class="col-3 col-p2-3">
               <input type="text" class="form-control" id="formGroupExampleInput" required>
            </div>
            <div class="separation2 questionMark" id="descrip">&quest;</div>
            <div class="col-3 col-p2-3 names">
               Descripción del Proyecto:
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group">
                  <span class="input-group-text"></span>
                  <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>
            </div>
         </div>
  
         <div class="row">
         <div class="separation questionMark" id='compañero'>&quest;</div>
         <div class="col-3 col-p2-3 names">
               Correo de Compañero:
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                </div>
            </div>
            <div class="separation2 questionMark" id="nivel">&quest;</div>
            <div class="col-3 col-p2-3 names">
               Nivel de Desarrollo:
            </div>
            <div class="col-3 col-p2-3">
               <select class="form-select" aria-label="Default select example">
                  <option selected>Seleccione una Opción</option>
                  <option value="1">Concepto</option>
                  <option value="2">Prototipo</option>
                  <option value="3">Producto Terminado</option>
                </select>
            </div>
         </div>

         <div class="row">
         <div class="separation"></div>
         <div class="col-3 col-p2-3 names">
               Correo de Compañero:
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                </div>
            </div>
            <div class="separation2 questionMark" id="video">&quest;</div>
            <div class="col-3 col-p2-3 names">
               Subir Video (.mp4): 
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <input class="form-control" type="file" id="formFile">
               </div>
            </div>
         </div>
         <div class="row">
         <div class="separation"></div>
         <div class="col-3 col-p2-3 names">
               Correo de Compañero:
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                </div>
            </div>
            <div class="separation2"></div>
            <div class="col-3 col-p2-3 names">
               Subir Poster (.pdf): 
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <input class="form-control" type="file" id="formFile">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="separation"></div>
         <div class="col-3 col-p2-3 names">
               Correo de Compañero:
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                </div>
            </div>
            <div class="separation2 questionMark" id="imagen">&quest;</div>
            <div class="col-3 col-p2-3 names">
               Subir Imagen del Proyecto (.png): 
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <input class="form-control" type="file" id="formFile">
               </div>
            </div>
         </div>
    
         <div class="row">
            <div class="col-12 col-p1-12 names1">
               Tiene Componente de Emprendimiento:
            </div>
         </div>
         <div class="row">
            <div class="col-12 col-p1-12">
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                  <label class="form-check-label" for="inlineRadio1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                  <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
                <br></br>
            </div>
         </div>
      </div>
      
      <button type="submit" class="btn btn-primary btn-custom btn-p1" onclick="document.location='respuesta_registro_proyecto.php'">Registrar</button>
      <br></br>
          <!-- SCRIPTS -->
    <script src="js/main.js"></script>
      </form>



</body>
</html>