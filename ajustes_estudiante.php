<?php
  require_once 'restrictedEstudiante.php';
  include 'database.php';
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM md1_estudiante WHERE  matricula = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($_SESSION['username']));
  $data = $q->fetch(PDO::FETCH_ASSOC);
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
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="ajustes_estudiante.php">Ajustes</a></li>
          </ul>
          <a class="navbar-brand" href="logout.php">
            <img src="img/logout.png" alt="" width="40" height="40">
          </a>
        </div>

    </div>
  </nav>
  <form name="MiForm" id="MiForm" method="post" action="cargar.php">
    <div class="container">
      <br>
      <h1>Ajustes</h1>
      <br>
      <div class="row">
        <div class="col-5 align-self-center">Nombre(s): </div>       
        <div class="col-5 align-self-center">
          <div class="input-group mb-3">
            <?php echo $data['nombre']; ?>
          </div>     
        </div>
        <div class="col-5 align-self-center">Correo: </div>
        <div class="col-5 align-self-center">
          <div class="input-group mb-3">
            <?php echo $data['matricula']."@tec.mx"; ?>
          </div>
        </div>
        <?php if($data['modelo'] !== NULL && $data['carrera'] !== NULL && $data['semestre'] !== NULL){ ?>
          <div class="col-5 align-self-center">Modelo: </div>
          <div class="col-5 align-self-center">
            <div class="input-group mb-3">
              <?php echo $data['modelo']; ?>
            </div>
          </div>
          <div class="col-5 align-self-center">Carrera: </div>
          <div class="col-5 align-self-center">
            <div class="input-group mb-3">
              <?php echo $data['carrera']; ?>
            </div>
          </div>
          <div class="col-5 align-self-center">Semestre: </div>
          <div class="col-5 align-self-center">
            <div class="input-group mb-3">
              <?php echo $data['semestre']; ?>
            </div>
          </div>
       <?php }else{ ?>
          <div class="col-5 align-self-center">Modelo: </div>
          <div class="col-3 align-self-center">
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name="modelo" id="areaInput" >
                <option selected disabled="disabled" value="">Seleccione una Opción</option>
                <option value="TEC21">TEC21</option>
                <option value="TEC20">TEC20</option>
              </select>
            </div>
          </div>
          <div class="col-5 align-self-center">Carrera: </div>
          <div class="col-3 align-self-center">
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name="carrera" id="areaInput" >
                <option selected disabled="disabled" value="">Seleccione una Opción</option>
                <option value="IRS">IRS</option>
                <option value="ITC">ITC</option>
                <option value="ITD">ITD</option>
              </select>
            </div>
          </div>
          <div class="col-5 align-self-center">Semestre: </div>
          <div class="col-3 align-self-center">
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name="semestre" id="areaInput" >
                <option selected disabled="disabled" value="">Seleccione una Opción</option>
                <option value="1er">1er Semestre</option>
                <option value="2do">2do Semestre</option>
                <option value="3er">3er Semestre</option>
                <option value="4to">4to Semestre</option>
                <option value="5to">5to Semestre</option>
                <option value="6to">6to Semestre</option>
                <option value="7mo">7mo Semestre</option>
                <option value="8vo">8vo Semestre</option>
                <option value="9no">9no Semestre</option>
                <option value="10mo">10mo Semestre</option>
              </select>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" name="guardar" class="btn btn-primary btn-custom btn-de-estado">Guardar Datos</button>
          </div>        
      </form>
      <?php }
      if($data['modelo'] !== NULL && $data['carrera'] !== NULL && $data['semestre'] !== NULL){ ?>
      <div class="col-12">
        <form name="MiForm" id="MiForm" method="post" action="ajustes_estudiante.php">
          <button type="submit" name="guardar" class="btn btn-primary btn-custom btn-de-estado">Editar datos</button>
        </form>
      </div>
      <?php } ?>  
      <div class="col-6">
        <button type="button" class="btn btn-primary btn-custom btn-de-estado" onclick="document.location='enviar_password_estudiante.php'">Recuperar contraseña</button>
      </div>
    <div class="col-6">
      <button type="button" class="btn btn-primary btn-custom btn-de-estado" onclick="document.location='logout.php'">Cerrar Sesión</button>  
    </div>
    </div>  
      <!-- SCRIPTS -->
  <script src="js/visibilidad_password.js"></script>   
</body>
</html>