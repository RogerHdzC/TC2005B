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
   <!-- BOOTSTRAP ICONS-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
   <!-- CSS -->
   <link href="css/general.css" rel="stylesheet">

   <title>Ajustes</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
            <li class="nav-item"><a class="nav-link" href="registrar_proyecto_estudiante.php">Registrar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="mis_proyectos_Estudiante.php">Mis proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="explorar_proyectos_estudiante.php">Explorar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_layout_estudiante.php">Ver Layout</a></li>
            <li class="nav-item"><a class="nav-link" href="resultados_estudiante.php">Resultados</a></li>
            <li class="nav-item"><a class="nav-link" href="sobre_nosotros_estudiante.php">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link" href="preguntas_frecuentes_estudiante.php">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="ajustes_estudiante.php">Ajustes</a></li>

          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_estudiantes.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>
   <div class="container">
    <br>
    <h1>Ajustes</h1>
    <br>
      <div class="row">
        <div class="col-5 align-self-center">Nombre(s): </div>       
        <div class="col-5 align-self-center">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" value="Pepito" aria-label="Recipient's username" aria-describedby="button-addon2">
          </div>     
        </div>
        <div class="col-5 align-self-center">Apellidos: </div>
        <div class="col-5 align-self-center">
          <div class="input-group mb-3">
            <input type="text" aria-label="First name" value="Manzana" class="form-control">
            <input type="text" aria-label="Last name" value="Rizo" class="form-control">
          </div>
        </div>
        <div class="col-5 align-self-center">Correo: </div>
        <div class="col-5 align-self-center">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" value="A0173****" aria-label="Username">
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" placeholder="" value="tec.mx" aria-label="Server">
          </div>
        </div>
        <div class="col-5 align-self-center">Contraseña: </div>
        <div class="col-5 align-self-center">
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="" value="**********" aria-label="Recipient's username" aria-describedby="button-addon2" id="password">
          </div>  
        </div>
        <div class="col-1">
         <i class="bi bi-eye-slash" id="togglePassword"></i>
        </div>
      </div>
      <div class="col-12">
        <button type="button" class="btn btn-primary btn-custom btn-de-estado" onclick="document.location='pagina_inicio_estudiantes.php'">Guardar</button>
      </div>
      <div class="col-12">
        <button type="button" class="btn btn-primary btn-custom btn-de-estado" onclick="document.location='logout.php'">Cerrar Sesión</button>  
      </div>
   </div>  
      <!-- SCRIPTS -->
  <script src="js/visibilidad_password.js"></script>   
</body>
</html>