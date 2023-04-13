<?php
  require_once 'restrictedEstudiante.php';
  include 'database.php';
$nombre = $_POST["nombre"] ;
$uf = $_POST["uf"];
$area = $_POST["area"];
$descripcion= $_POST["descripcion"];
$portada = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$correoLider = $_SESSION['username'];
$compañero1 = $_POST["compañero1"];
$compañero2 = $_POST["compañero2"];
$compañero3 = $_POST["compañero3"];
$compañero4 = $_POST["compañero4"];
$correoProfesor = $_POST["profesor"];
$nivel = $_POST["nivel"];
$emprendimiento = $_POST["inlineRadioOptions"];
$edicion = $_POST["edicion"];
$promedio = 0;
$autorizado = 0;
$id = 0;
if ( !empty($_GET['id'])) {
   $id = $_REQUEST['id'];
}

if (isset($_POST['guardarCambios'])){
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql ="UPDATE `md1_proyecto` SET `nombre` = ? , `UF` = ?, `areaEstrategica` = ? , descripcion = ? , portada = ?, correoLider = ?, correoCompañero1 = ? , correoCompañero2 = ? , correoCompañero3 = ? , correoCompañero4 = ?, correoProfesor = ?, nivel = ?, promedio=?,componeteDeEmprendimiento=?,idEdicion=?,autorizado=? WHERE `md1_proyecto`.`id` = ? ";
  $q = $pdo->prepare($sql);
  $q->execute(array($nombre, $uf,$area, $descripcion, $portada, $correoLider, $compañero1,$compañero2, $compañero3, $compañero4,$correoProfesor,$nivel,$promedio,$emprendimiento,$edicion,$autorizado, $id));
  
  Database::disconnect();
  header('Location: pagina_inicio_estudiantes.php');  
}else{
  $pdo = Database::connect();
  
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql ="INSERT INTO md1_proyecto (nombre,UF,areaEstrategica,descripcion,portada,correoLider,correoCompañero1,correoCompañero2,correoCompañero3,correoCompañero4,correoProfesor,nivel,promedio,componeteDeEmprendimiento,idEdicion,autorizado)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
          $q = $pdo->prepare($sql);
          $q->execute(array($nombre,$uf,$area,$descripcion,$portada,$correoLider,$compañero1,$compañero2,$compañero3,$compañero4,$correoProfesor,$nivel,$promedio,$emprendimiento,$edicion,$autorizado));
  
  header('Location: pagina_inicio_estudiantes.php');  
  Database::disconnect();
}

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
            
            <li class="nav-item"><a class="nav-link" href="registrar_proyecto_estudiante.php">Registrar Proyectos</a></li>
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


    <br></br>
    <div class="card col-6 offset-3 text-white bg-primary" style="max-width: 80rem;">
        <div class="card-body msg">
          <h2 class="card-title">¡Muy bien!</h2>
          <h4 class="card-text">Tu proyecto ha sido registrado. El profesor encargado de la Unidad de Formación del Proyecto determinará si tu proyecto cumple con todos los requisitos para ser aprobado. Puedes consultar tus proyectos en la sección "Mis Proyectos".</p>
        </div>
    </div>
    <br></br>
        <button type="button" class="btn btn-primary btn-custom btn-p1" onclick="document.location='mis_proyectos_Estudiante.php'">Continuar</button>
</body>
</html>