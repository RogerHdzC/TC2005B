<?php
  require_once 'restrictedDocenteJuez.php';
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
              
              <li class="nav-item-docenJuez"><a class="nav-link" href="mis_proyectos_docenteJuez.php">Mis proyectos</a></li>
              <li class="nav-item-docenJuez"><a class="nav-link"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
              <li class="nav-item-docenJuez"><a class="nav-link"  href="proyectosa_calificar.php">Proyectos a Calificar</a></li>
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
            <div class="col-3 col-p2-3">
               Nombre del Proyecto: 
            </div>
            <div class="col-3 col-p2-3">
               <input type="text" class="form-control" value="Programming AI" required>
            </div>
            <div class="col-3 col-p2-3">
               Profesor: 
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <input type="text" class="form-control" id="formGroupExampleInput" value="Daniel Pérez Rojas" required>
                </div>
            </div>
         </div>
         <div class="row">
            <div class="col-3 col-p2-3">
               Categoría
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <input type="text" class="form-control" id="validationServer02" value="Computación" required>
                </div>
            </div>
            <div class="col-3 col-p2-3">
               Correo del Profesor:
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username" value="danperez" required>
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" placeholder="Server" aria-label="Server" value="tec.mx" required>
                </div>
            </div>
         </div>
         <div class="row">
            <div class="col-3 col-p2-3">
               Área Estratégica
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <select class="form-select" aria-label="Default select example" required>
                     <option value="1">Nano</option>
                     <option value="2">Bio</option>
                     <option value="3">Nexus</option>
                     <option selected="4">Cyber</option>
                   </select>
                </div>
            </div>
            <div class="col-3 col-p2-3">
               Descripción del Proyecto
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group">
                  <span class="input-group-text"></span>
                  <textarea class="form-control" aria-label="With textarea">Este proyecto consiste en la programación de una IA... </textarea>
                </div>
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-3 col-p2-3">
               Nombre de la UF:
            </div>
            <div class="col-3 col-p2-3">
               <input type="text" class="form-control" id="formGroupExampleInput" value="Construcción de Software (TC2005B)" required>
            </div>
            <div class="col-3 col-p2-3">
               Nivel de Desarrollo:
            </div>
            <div class="col-3 col-p2-3">
               <select class="form-select" aria-label="Default select example">
                  <option selected="1">Concepto</option>
                  <option value="2">Prototipo</option>
                  <option value="3">Producto Terminado</option>
                </select>
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-3 col-p2-3">
               Correo de Compañero
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" aria-label="Username" value="A0XXXXXXX">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" aria-label="Server" value="tec.mx">
                </div>
            </div>
            <div class="col-3 col-p2-3">
               Espacio Para Subir Video (.mp4): 
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <input class="form-control" type="file" id="formFile">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-3 col-p2-3">
               Correo de Compañero
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" aria-label="Username" value="A0XXXXXXX">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" aria-label="Server" value="tec.mx">
                </div>
            </div>
            <div class="col-3 col-p2-3">
               Espacio Para Subir Poster (.pdf): 
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <input class="form-control" type="file" id="formFile">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-3 col-p2-3">
               Correo de Compañero
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" aria-label="Username" value="A0XXXXXXX">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" aria-label="Server" value="tec.mx">
                </div>
            </div>
            <div class="col-3 col-p2-3">
               Espacio Para Subir Imagen del Proyecto (.png): 
            </div>
            <div class="col-3 col-p2-3">
               <div class="mb-3">
                  <input class="form-control" type="file" id="formFile">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-3 col-p2-3">
               Correo de Compañero
            </div>
            <div class="col-3 col-p2-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" aria-label="Username" value="A0XXXXXXX">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" aria-label="Server" value="tec.mx">
                </div>
            </div>
         </div>
         <div class="row">
            <div class="col-9 col-p1-9">
               Tiene Componente de Emprendimiento
            </div>
         </div>
         <div class="row">
            <div class="col-9 col-p1-9">
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
      </form>
</body>
</html>