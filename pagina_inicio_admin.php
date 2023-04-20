<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
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
    
    
    <title>Inicio</title>
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
            <li class="nav-item-admin"><a class="nav-link" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="preguntas_frecuentes_admin.php">Preguntas Frecuentes</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="historicodatos.php">Historico de Datos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ajustes_admin.php">Ajustes</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ver_layout_admin.php">Layout</a></li>

          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_admin.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>
  <div class="container-fluid">
  <br>
  <h1>Inicio</h1>
  <br></br>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary btn-custom btn-p3" href="ver_usuarios_admin.php" role="button">Ver Usuarios</a>
      </div>
      <div class="col-6">
        <a class="btn btn-primary btn-custom btn-p3" href="ver_proyectos_Admin.php" role="button">Ver Proyectos</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary btn-custom btn-p3" href="sobre_nosotros_admin.php" role="button">Sobre Nosotros</a>
      </div>
      <div class="col-6">
        <a class="btn btn-primary btn-custom btn-p3" href="preguntas_frecuentes_admin.php" role="button">Preguntas Frecuentes</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary btn-custom btn-p3" href="historicodatos.php" role="button">Descargar Histórico de Datos</a>
      </div>
      <div class="col-6">
         <a class="btn btn-primary btn-custom btn-p3" href="ajustes_admin.php" role="button">Ajustes</a>
      </div>
    </div>
    <br>

    <div class="row">
    <div class="col-6">
         <a class="btn btn-primary btn-custom btn-p3" href="ver_layout_admin.php" role="button">Ver layout</a>
      </div>
      <div class="col-6">
        <form>
        <input class="form-control" type="file" id="formFile">
        <button type="submit" class="btn btn-primary btn-custom btn-p1" >Subir anuncio</button>
        </form>
      </div>
</div>
<br>
    <div class="row">
      <div class="col-6">
      <form action=""  method="POST" enctype="multipart/form-data">
        <input class="form-control" type="file" id="formFile" name="image">
        <button type="submit" class="btn btn-primary btn-custom btn-p1" >Subir layout</button>
      </form>  
      </div>  
      <div class="col-6">
        
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
</body>
</html>

<?php 
  $pdo = Database::connect();
  $consulta = "SELECT * FROM md1_layout";
  
  foreach ($pdo->query($consulta) as $colum){
    $id = $colum['id'];
  }
  $layout = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM md1_layout WHERE id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $sql2 ="INSERT INTO md1_layout (layout)
  VALUES (?)"; 
  $q = $pdo->prepare($sql2);
  $q->execute(array($layout));
  header('Location: ver_layout_admin.php');  
  Database::disconnect();
  ?>