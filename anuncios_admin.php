<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
  $pdo = Database::connect();
  $consulta = "SELECT * FROM anuncios";
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

    <title>Anuncios</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <a class="navbar-brand" href="pagina_inicio_admin.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="ver_usuarios_admin.php">Ver Usuarios</a></li>
            <li class="nav-item"><a class="nav-link" href="asignar_jueces.php">Asignar Jueces</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" href="historicodatos.php">Historico de Datos</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_layout_admin.php">Mapa</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="anuncios_admin.php">Anuncios</a></li>
            <li class="nav-item"><a class="nav-link" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link" href="preguntas_frecuentes_admin.php">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a class="nav-link" href="ajustes_admin.php">Ajustes</a></li>
          </ul>
          <a class="navbar-brand" href="logout.php">
            <img src="img/logout.png" alt="" width="40" height="40">
          </a>
        </div>

    </div>
  </nav>
  <br>
      <h1>Anuncios </h1>
   <br>
   <form name="MiForm" id="MiForm" method="post" action="cargar.php" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
              <div class="col-4 col-4-a">
                <h4 class="text-center">Escriba el anuncio</h4>
              </div>
              <div class="col-4 col-4-a">
                <h4 class="text-center">Seleccione imagen a cargar</h4>
              </div>
              <div class="col-4 col-4-a">
                <h4 class="text-center">Acciones</h4>
              </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h2 class="p-a"><b>Escriba el anuncio</b></h2>
                    <textarea class="form-control" aria-label="With textarea" name="anuncio" id="descripInput"></textarea>
                </div>
                <div class="col-4">
                    <h2 class="p-a"><b>Seleccione imagen a cargar</b></h2>
                    <input type="file" class="form-control" id="image" name="image" multiple>
                </div>
                <div class="col-4">
                    <h2 class="p-a"><b>Acciones</b></h2>
                    <button name="subir_imagen" class="btn btn-primary">Cargar anuncio</button>
                </div>
            </div>
        </div>
          
    </form>

    <div class="container">
      <div class="row">
        <div class="col-3 col-4-a"><h2><b>Anuncio</b></h2></div>
        <div class="col-3 col-4-a"><h2><b>Imagen</b></h2></div>
        <div class="col-3 col-4-a"><h2><b>Fecha</b></h2></div>
        <div class="col-3 col-4-a"><h2><b>Acciones</b></h2></div>
      </div>
      <div class="row">
        <?php foreach ($pdo->query($consulta) as $colum){ ?>
          <div class="col-3">
            <h2 class="p-a"><b>Anuncio</b></h2>
            <p><?php echo $colum['anuncio'] ?></p>
          </div>
          <?php if($colum['imagen'] != NULL) { ?>
          <div class="col-3">
            <h2 class="p-a"><b>Imagen</b></h2>
            <img class="img-fluid" src='vista.php?id=<?php echo $colum['id'] ?>' alt='Img blob desde MySQL' width="100" />  
          </div>
          <?php }else{ ?>
            <div class="col-3"></div>
            <?php } ?>
          <div class="col-3">
            <h2 class="p-a"><b>Fecha</b></h2>
            <p><?php echo $colum['hora'] ?></p>
          </div>
          <div class="col-3">
            <h2 class="p-a"><b>Acciones</b></h2>
              <a class="btn btn-danger" href="deleteAnuncio.php?id=<?php echo base64_encode($colum['id']);?>">Eliminar</a>
          </div>  
        <?php } ?>
      </div>
    </div>
    </body>
</html>