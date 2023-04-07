
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
    
    include 'database.php';

    $pdo = Database::connect();

    $consulta = "SELECT * FROM md1_docente";
?>



<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
            <li class="nav-item-admin"><a class="nav-link active" href="ver_usuarios_admin.php">Ver Usuarios</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="preguntas_frecuentes_admin.php">Preguntas Frecuentes</a></li>
            <li class="nav-item-admin"><a class="nav-link" aria-current="page" href="historicodatos.php">Historico de Datos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ajustes_admin.php">Ajustes</a></li>
            
          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_admin.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>
      <br>
      <h1>Usuarios</h1>
      <br>
    <div class="container font-20">
       <div class="row">
            <div class="col-4">Nombre</div>
            <div class="col-4">Correo</div>
            <div class="col-4">Rol</div>
       </div> 
        <?php 
        $num=0; 
        foreach ($pdo->query($consulta) as $colum){
            echo "<div class='row'>";
                echo "<div class='col-4'>";
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDefault$num'>";
                echo "<label class='form-check-label' for='flexCheckDefault$num'>";
                echo "<p>" . $colum['nombre']. "</p>";
                echo "</label>";
                echo "</div>";
                echo "</div>";
                echo "<div class='col-4'>";    
                    echo "<p>" . $colum['nomina']. "</p>";
                echo "</div>";
                echo "<div class='col-4'>";    
                    echo "<p>" . "Docente". "</p>";
                echo "</div>";
            echo "</div>";
            $num=$num+1;
        }
        $consulta2 = "SELECT * FROM md1_estudiante";

        foreach ($pdo->query($consulta2) as $colum)
        {

        echo "<div class='row'>";
            echo "<div class='col-4'>";
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDefault$num'>";
            echo "<label class='form-check-label' for='flexCheckDefault$num'>";
            echo "<p>" . $colum['nombre']. "</p>";
            echo "</label>";
            echo "</div>";
            echo "</div>";
            echo "<div class='col-4'>";    
                echo "<p>" . $colum['matricula']. "@tec.mx" ."</p>";
            echo "</div>";
            echo "<div class='col-4'>";    
                echo "<p>" . "Estudiante". "</p>";
            echo "</div>";
        echo "</div>";
        $num=$num+1;
        }
        $consulta2 = "SELECT * FROM md1_jurado";
        foreach ($pdo->query($consulta2) as $colum)
        {
        echo "<div class='row'>";
            echo "<div class='col-4'>";
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDefault$num'>";
            echo "<label class='form-check-label' for='flexCheckDefault$num'>";
            echo "<p>" . $colum['nombre']. "</p>";
            echo "</label>";
            echo "</div>";
            echo "</div>";
            echo "<div class='col-4'>";    
                echo "<p>" . $colum['correo']. "</p>";
            echo "</div>";
            echo "<div class='col-4'>";    
                echo "<p>" . "Juez". "</p>";
            echo "</div>";
        echo "</div>";
        $num=$num+1;
     }

     Database::disconnect();
     ?>
     
        <div class="row">
            <div class="col-12">
            <button type="button" class="btn btn-danger btn-custom btn-de-estado">Eliminar Usuarios</button>
            </div>
        </div>

    </div>
     
</body>
</html>

