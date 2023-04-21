<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
  $pdo = Database::connect();
  $consulta2 = "SELECT * FROM md1_administrador";
  $consulta3 = "SELECT * FROM md1_proyecto";
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
   <link href="css/asignarJueces.css" rel="stylesheet">
    <title>Jueces</title>
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
                
              </ul>
            </div>
            <a class="navbar-brand" href="pagina_inicio_admin.php">
              <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
            </a>
        </div>
      </nav>
      <br>
      <h1>Asignación de Jurado</h1>
      <form action=""  method="POST" id="signup">
        <!--<input type="submit" class="btn btn-primary" value="Asignar de manera aleatoria" name="aleatoria">-->
        <input type="submit" class="btn btn-primary" value="Asignar de manera manual" name="manual">
      </form>
      <br>

      <?php
      
        if(isset($_POST['aleatoria'])){
          echo "<h1>EN DESARROLLO</h1>";
        }elseif(isset($_POST['manual'])){?>
          <div class="container">
            <div class="row">
              <div class="col-6">
                <h1>PROYECTOS</h1>
              </div>
              <div class="col-6">
                <h1>JURADOS</h1>
              </div>
            </div>
          <?php foreach ($pdo->query($consulta3) as $colum){?>
            <div class="row">
              <div class="col-6">
                <div class="container">
                  <div class="row">
                    <div class="col-6">
                      <h5 class='card-title'> <?php  echo $colum['nombre']; ?> </h5>
                    </div>
                    <div class="col-6">
                      <a class="btn btn-primary" href="verMas_proyecto_admin.php?id=<?php echo $colum['id'];?>">Ver más</a>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="col-6">
                <form action=""  method="POST" id="signup" enctype="multipart/form-data">
                  <div class="container">
                    <div class="row">
                        <div class="col-3">
                          <select class="form-select" aria-label="Default select example" name="califica1" id="nivelInput">
                            <option selected value="" disabled="disabled">Seleccione una Opción</option>
                            <?php
                            $pdo = Database::connect();
                            $uf=$colum['UF'];
                            $query = 'SELECT * FROM md1_jurado';
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_ensena as e WHERE d.es_jurado=1 AND (e.idProfesor=d.nomina AND e.idUf != 'TC2005B')";
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = 'SELECT * FROM md1_administrador';
                            foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            Database::disconnect();
                            ?>
                          </select>
                        </div>
                        <div class="col-3">
                          <select class="form-select" aria-label="Default select example" name="califica2" id="nivelInput">
                            <option selected value="" disabled="disabled">Seleccione una Opción</option>
                            <?php
                            $pdo = Database::connect();
                            $query = 'SELECT * FROM md1_jurado';
                            foreach ($pdo->query($query) as $row) {
                            echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_ensena as e WHERE d.es_jurado=1 AND (e.idProfesor=d.nomina AND e.idUf != 'TC2005B')";
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = 'SELECT * FROM md1_administrador';
                            foreach ($pdo->query($query) as $row) {
                                        echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            Database::disconnect();
                            ?>
                          </select>
                        </div>
                        <div class="col-3">
                          <select class="form-select" aria-label="Default select example" name="califica3" id="nivelInput">
                            <option selected value="" disabled="disabled">Seleccione una Opción</option>
                            <?php
                            $pdo = Database::connect();
                            $query = 'SELECT * FROM md1_jurado';
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_ensena as e WHERE d.es_jurado=1 AND (e.idProfesor=d.nomina AND e.idUf != 'TC2005B')";
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = 'SELECT * FROM md1_administrador';
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            Database::disconnect();
                            ?>
                          </select>
                        </div>
                        <div class="col-3">
                          <select class="form-select" aria-label="Default select example" name="califica4" id="nivelInput">
                            <option selected value="" disabled="disabled">Seleccione una Opción</option>
                            <?php
                            $pdo = Database::connect();
                            $query = 'SELECT * FROM md1_jurado';
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['correo'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = "SELECT d.nomina,d.nombre,d.es_jurado FROM md1_docente as d, md1_ensena as e WHERE d.es_jurado=1 AND (e.idProfesor=d.nomina AND e.idUf != 'TC2005B')";
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            $query = 'SELECT * FROM md1_administrador';
                            foreach ($pdo->query($query) as $row) {
                                          echo "<option value='" . $row['nomina'] . "'>" . $row['nombre'] . "</option>";
                            }
                            Database::disconnect();
                            ?>
                          </select>
                        </div>
                    </div>
                  </div>
                </form>  
              </div> 
            </div>   
          <?php } ?>
          </div>
        <?php } ?>
</body>
</html>

