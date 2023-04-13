<?php
  require_once 'restrictedEstudiante.php';
  include 'database.php';
  $pdo = Database::connect();
  $consulta = "SELECT * FROM md1_proyecto";
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
   <link href="css/general.css" rel="stylesheet" type="text/css">
   
    <title>Explorar Proyectos</title>
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
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="explorar_proyectos_estudiante.php">Explorar Proyectos</a></li>
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
  <h1>Explorar Proyectos</h1> 
  <br></br>
  <?php
  foreach ($pdo->query($consulta) as $colum){
    ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="row row-cols-1 row-cols-md-2 mb-2 text-center">
                    <div class="col">
                      <div class="card h-100">
                        <img src='data:image/png;base64,<?php echo base64_encode($colum['portada']);?>' class='card-img-top' alt='Imagen de Portada Proyecto' width='100%' height='100%'>
                        <div class='card-body card-p1'>
                          <h5 class='card-title'> <?php  echo $colum['nombre']; ?> </h5>
                          <p class='card-text'><?php  echo $colum['descripcion']; ?></p>
                          <a class="btn btn-primary" href="verMas_proyecto_estudiante.php?id=<?php echo $colum['id'];?>">Ver más</a>
                        </div>
                        <br>
                      </div>
                    </div>
                  </div>
              </div>
          </div>              
    </div>
  <?php } ?>
</body>
</html>