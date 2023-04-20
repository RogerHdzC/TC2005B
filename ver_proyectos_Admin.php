<?php
  require_once 'restrictedAdmin.php';
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
   <link href="css/general.css" rel="stylesheet">
   <link href="css/verProyectosAdmin.css" rel="stylesheet">
    <title>Proyectos</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
            <li class="nav-item-admin"><a class="nav-link" href="ver_usuarios_admin.php">Ver Usuarios</a></li>
            <li class="nav-item-admin"><a class="nav-link active" aria-current="page" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="preguntas_frecuentes_admin.php">Preguntas Frecuentes</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="historicodatos.php">Historico de Datos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ver_layout_admin.php">Layout</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ajustes_admin.php">Ajustes</a></li>
            
          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_admin.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>
  <br></br>
  <h1>Proyectos</h1> 
  <br></br>

  <?php
  foreach ($pdo->query($consulta) as $colum){
    ?>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="row row-cols-1 row-cols-md-2 mb-2 text-center">
                    <div class="col">
                      <div class="card h-100">
                        <div class='card-body card-p1'>
                          <h5 class='card-title'> <?php  echo $colum['nombre']; ?> </h5>
                          <p class='card-text'><?php  echo $colum['descripcion']; ?></p>
                          <a class="btn btn-primary" href="verMas_proyecto_admin.php?id=<?php echo $colum['id'];?>">Ver más</a>
                          <a class="btn btn-danger" href="deleteProyectos.php?id=<?php echo $colum['id'];?>">Eliminar</a>
                          <?php
                            if ($colum['autorizado'] == 0){?>
                              <a href="aprobarProyectosAdmin.php?id=<?php echo $colum['id'];?>" class="btn btn-primary btn-success">Aprobar</a>
                          <?php }elseif(($colum['autorizado'] != 0)){?>
                              <a href="calificar_admin.php?id=<?php echo $colum['id'];?>" class="btn btn-primary btn-success">Calificar</a>
                          <?php }
                          ?>
                        </div>
                        <br>
                      </div>
                    </div>
                  </div>
              </div>
          
  <?php } ?>
            <div class="col-3">
                <h2>Tipo de Proyecto</h2>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label check-p1" for="flexCheckDefault">
                    Pendiente
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label check-p1" for="flexCheckDefault">
                    Aprobado
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label check-p1" for="flexCheckDefault">
                    Calificado
                  </label>
                </div>
                <br>
              <h2>Área Estratégica</h2>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label check-p1" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label check-p1" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label check-p1" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label check-p1" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <br>
              <h2> Categoría</h2>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label check-p1" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label check-p1" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label check-p1" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label check-p1" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <br>
              <button type="button" class="btn btn-de-estado btn-primary btn-custom btn-p1" onclick="document.location='asignar_jueces.php'">Asignar Jueces</button>
            </div>
        </div>
      </div>
    </div>
      </div>              
    </div>
</body>
</html>