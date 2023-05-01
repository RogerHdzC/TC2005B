<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
  $pdo = Database::connect();

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

   <title>Usuarios</title>
</head>
<body>
<?php

    $consulta = "SELECT * FROM md1_docente WHERE borrado IS NULL";
?>
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
            <li class="nav-item"><a class="nav-link active" href="ver_usuarios_admin.php">Ver Usuarios</a></li>
            <li class="nav-item"><a class="nav-link" href="asignar_jueces.php">Asignar Jueces</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="historicodatos.php">Historico de Datos</a></li>
            <li class="nav-item"><a class="nav-link" href="ver_layout_admin.php">Mapa</a></li>
            <li class="nav-item"><a class="nav-link" href="anuncios_admin.php">Anuncios</a></li>
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
      <h1>Usuarios</h1>
      <br>

    <div class="container">
      <p>
        <a class="btn btn-primary btn-custom btn-p5" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          <b>Docentes</b>
        </a>
      </p>    
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <div class="container font-20 p1-color text-center">
                <div class="row">
                    <div class="col-3 col-3-a col-4-a"><b>Nombre</b></div>
                    <div class="col-3 col-3-a col-4-a"><b>Correo</b></div>
                    <div class="col-3 col-3-a col-4-a"><b>Rol</b></div>
                    <div class="col-3 col-3-a col-4-a"><b>Acciones</b></div>
                </div> 
                <?php 
                $num=0; 
                foreach ($pdo->query($consulta) as $colum)
                { $num=$num+1;?>
                    <div class='row'>
                        <div class='col-3 col-3-a'>
                        <p class="p-a"><b>Nombre</b></p>
                        <div class='form-check'>
                        <p><?php echo $colum['nombre']; ?></p>
                        </label>
                        </div>
                        </div>
                        <div class='col-3 col-3-a'>
                        <p class="p-a"><b>Correo</b></p>
                            <p><?php 
                            echo $colum['nomina']. "@tec.mx"?> </p>
                        </div>
                        <div class='col-3 col-3-a'>
                        <p class="p-a"><b>Rol</b></p>  
                            <?php  
                            if ($colum['es_jurado'] ==0 ){
                                echo "<p>Docente</p>";
                            }else{
                                echo "<p>Docente y Jurado</p>";
                            }
                            ?>
                        </div>
                        <div class="col-3 col-3-a">
                        <p class="p-a"><b>Acciones</b></p>
                            <?php if ($colum['es_jurado'] ==0 ){ ?>
                                <a class="btn btn-success" href="updateJuez.php?id=<?php echo base64_encode($colum['nomina']);?>">Asignar rol de juez</a>
                            <?php }else{ ?>
                                <a class="btn btn-warning" href="deleteJuez.php?id=<?php echo base64_encode($colum['nomina']);?>">Quitar rol de juez</a>
                            <?php } ?>
                            <a class="btn btn-danger" href="deleteUsuario.php?id=<?php echo base64_encode($colum['nomina']);?>">Eliminar</a>
                        </div>
                    </div>
                    <?php 
                }?>
            </div>
        </div>
      </div>
      <p>
        <a class="btn btn-primary btn-custom btn-p5" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
          <b>Estudiantes</b>
        </a>
      </p>    
      <div class="collapse" id="collapseExample3">
        <div class="card card-body">
            <div class="container font-20 p1-color text-center">
                <div class="row">
                    <div class="col-3 col-3-a col-4-a"><b>Nombre</b></div>
                    <div class="col-3 col-3-a col-4-a"><b>Correo</b></div>
                    <div class="col-3 col-3-a col-4-a"><b>Rol</b></div>
                    <div class="col-3 col-3-a col-4-a"><b>Acciones</b></div>
                </div> 
                <?php 
                $num=0; 
                $consulta2 = "SELECT * FROM md1_estudiante WHERE borrado IS NULL";
                foreach ($pdo->query($consulta2) as $colum)
                { $num=$num+1;?>
                    <div class='row'>
                        <div class='col-3 col-3-a'>
                        <p class="p-a"><b>Nombre</b></p>

                        <div class='form-check'>
                        <p><?php echo $colum['nombre']; ?></p>
                        </label>
                        </div>
                        </div>
                        <div class='col-3 col-3-a'>
                        <p class="p-a"><b>Correo</b></p>

                            <p><?php 
                            echo $colum['matricula']. "@tec.mx"?> </p>
                        </div>
                        <div class='col-3 col-3-a'>  
                        <p class="p-a"><b>Rol</b></p>
                            <p>Estudiante</p>
                        </div>
                        <div class="col-3 col-3-a">
                        <p class="p-a"><b>Acciones</b></p>

                            <a class="btn btn-danger" href="deleteUsuario.php?id=<?php echo base64_encode($colum['matricula']);?>">Eliminar</a>
                        </div>
                    </div>
                    <?php 
                }?>
            </div>
        </div>
      </div>
      <p>
        <a class="btn btn-primary btn-custom btn-p5" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
          <b>Jueces</b>
        </a>
      </p>    
      <div class="collapse" id="collapseExample2">
        <div class="card card-body">
            <div class="container font-20 p1-color text-center">
                <div class="row">
                    <div class="col-3 col-3-a col-4-a"><b>Nombre</b></div>
                    <div class="col-3 col-3-a col-4-a"><b>Correo</b></div>
                    <div class="col-3 col-3-a col-4-a"><b>Rol</b></div>
                    <div class="col-3 col-3-a col-4-a"><b>Acciones</b></div>
                </div> 
                <br>
                <?php 
                $num=0; 
                $consulta3 = "SELECT * FROM md1_jurado WHERE borrado IS NULL";
                foreach ($pdo->query($consulta3) as $colum)
                { $num=$num+1;?>
                    <div class='row'>
                        <div class='col-3 col-3-a'>
                            <p class="p-a"><b>Nombre</b></p>
                        <div class='form-check'>
                        <p><?php echo $colum['nombre']; ?></p>
                        </label>
                        </div>
                        </div>
                        <div class='col-3 col-3-a'>
                        <p class="p-a"><b>Correo</b></p>
                            <p><?php 
                            echo $colum['correo']?> </p>
                        </div>
                        <div class='col-3 col-3-a'>
                        <p class="p-a"><b>Rol</b></p>  
                            <p>Juez</p>
                        </div>
                        <div class="col-3 col-3-a">
                        <p class="p-a"><b>Acciones</b></p>
                            <?php if($colum['confirmado'] != 1){ ?>
                                <a class="btn btn-success" href="aceptarJuez.php?id=<?php echo base64_encode($colum['correo']);?>">Aceptar juez</a>
                            <?php } ?>
                            <a class="btn btn-danger" href="deleteUsuario.php?id=<?php echo base64_encode($colum['correo']);?>">Eliminar</a>
                        </div>
                    </div>
                    <?php 
                }?>
            </div>
        </div>
      </div>
    </div>    
</body>
</html>

