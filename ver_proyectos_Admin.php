<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
  $pdo = Database::connect();
  $consulta = "SELECT * FROM md1_proyecto";
  include_once "base_de_datos.php";
  if (!isset($_POST['buscadepartamento'])){$_POST['buscadepartamento'] = '';}
  if (!isset($_POST['buscaarea'])){$_POST['buscaarea'] = '';}
  if (!isset($_POST['buscanivel'])){$_POST['buscanivel'] = '';}
  if (!isset($_POST['orden'])){$_POST['orden'] = '';}
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
            <li class="nav-item-admin"><a class="nav-link" href="asignar_jueces.php">Asignar Jueces</a></li>
            <li class="nav-item-admin"><a class="nav-link active" aria-current="page" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="historicodatos.php">Historico de Datos</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ver_layout_admin.php">Mapa</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="preguntas_frecuentes_admin.php">Preguntas Frecuentes</a></li>
            <li class="nav-item-admin"><a class="nav-link" href="ajustes_admin.php">Ajustes</a></li>
            
          </ul>
        </div>
        <a class="navbar-brand" href="pagina_inicio_admin.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
        <a class="navbar-brand" href="logout.php">
          <img src="img/logout.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>
  <h1>Proyectos</h1> 
  <button type="button" class="btn btn-de-estado btn-primary btn-custom btn-p1" onclick="document.location='asignar_jueces.php'">Asignar Jueces</button>
    <div class="container">
    <div class="row">
      <div class="col-3">
        <form id="form2" name="form2" method="POST" action="ver_proyectos_Admin.php">
          <h2>Estado del Proyecto</h2>
          <div class="mb-3">
            <select id="assigned-tutor-filter" id="buscadepartamento" name="buscadepartamento" class="form-select form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
              <?php if ($_POST["buscadepartamento"] != ''){ ?>
              <option value="<?php echo $_POST["buscadepartamento"]; ?>">
              <?php 
                  if($_POST["buscadepartamento"] == 0){
                      echo "Pendiente"; 
                  }elseif($_POST["buscadepartamento"] == 1){
                      echo "Aprobado"; 
                  }else{
                      echo "Calificado";
                  }
              ?></option>
              <?php } ?>
              <option value="">Todos</option>
              <option value="0">Pendiente</option>
              <option value="1">Aprobado</option>
              <option value="2">Calificado</option>
            </select>
          </div>
          <small></small>
          <h2>Área Estratégica</h2>
          <div class="mb-3">
            <select id="assigned-tutor-filter" id="buscaarea" name="buscaarea" class="form-select form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
              <?php if ($_POST["buscaarea"] != ''){ ?>
              <option value="<?php echo $_POST["buscaarea"]; ?>"><?php echo $_POST["buscaarea"]; ?></option>
              <?php } ?>
              <option value="">Todos</option>
              <option value="Nano">Nano</option>
              <option value="Bio">Bio</option>
              <option value="Nexus">Nexus</option>
              <option value="Cyber">Cyber</option>
            </select>
          </div>
          <small></small>
          <h2>Nivel de Desarrollo</h2>
          <div class="mb-3">
            <select id="subject-filter" id="buscanivel" name="buscanivel" class="form-select form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
              <?php if ($_POST["buscanivel"] != ''){ ?>
              <option value="<?php echo $_POST["buscanivel"]; ?>"><?php echo $_POST["buscanivel"]; ?></option>
              <?php } ?>
              <option value="">Todos</option>
              <option value="Concepto">Concepto</option>
              <option value="Prototipo">Prototipo</option>
              <option value="Terminado">Producto Terminado</option>
            </select>
          </div>
          <small></small>
          <h2>Ordenad por: </h2>
          <div class="mb-3">
            <select id="assigned-tutor-filter" id="orden" name="orden" class="form-select form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
              <?php if ($_POST["orden"] != ''){ ?>
              <option value="<?php echo $_POST["orden"]; ?>">
              <?php
              if ($_POST["orden"] == '1'){echo 'Ordenar por nombre';} 
              if ($_POST["orden"] == '2'){echo 'Ordenar por estado del proyecto';} 
              if ($_POST["orden"] == '3'){echo 'Ordenar por area estrategica';} 
              if ($_POST["orden"] == '4'){echo 'Ordenar por nivel de desarrollo';} 
              if ($_POST["orden"] == '5'){echo 'Ordenar por promedio';} 
              ?>
              </option>
              <?php } ?>
              <option value="0">SIn orden específico</option>
              <option value="1">Ordenar por nombre</option>
              <option value="2">Ordenar por estado del proyecto</option>
              <option value="3">Ordenar por area estrategica</option>
              <option value="4">Ordenar por nivel de desarrollo</option>
              <option value="5">Ordenar por promedio</option>
            </select>
          </div>
          <input type="submit" class="btn btn-primary" value="Filtrar">
        </form>
      </div>
      <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        if ($_POST['buscadepartamento'] == '' AND $_POST['buscaarea'] == '' AND $_POST['buscanivel'] == ''){ 
          $query ="SELECT * FROM md1_proyecto";
          $query2 = "SELECT count(*) as conteo FROM md1_proyecto";
        }else{
              $query ="SELECT * FROM md1_proyecto";
              $query2 = "SELECT count(*) as conteo FROM md1_proyecto";
              if ($_POST["buscadepartamento"] != '' ){
                  $query .= " WHERE ((autorizado = '".$_POST['buscadepartamento']."') OR (promedio > '".$_POST['buscadepartamento']."'))";
                  $query2 .= " WHERE ((autorizado = '".$_POST['buscadepartamento']."') OR (promedio > '".$_POST['buscadepartamento']."'))";
                  if ($_POST["buscaarea"] != '' ){
                      $query .= " AND (areaEstrategica = '".$_POST['buscaarea']."')";
                      $query2 .= " AND (areaEstrategica = '".$_POST['buscaarea']."')";
                  }
                  if ($_POST["buscanivel"] != '' ){
                      $query .= " AND nivel = '".$_POST["buscanivel"]."' ";
                      $query2 .= " AND nivel = '".$_POST["buscanivel"]."' ";
                  }
              }else{
                  if ($_POST["buscaarea"] != '' ){
                      $query .= " WHERE (areaEstrategica = '".$_POST['buscaarea']."')";
                      $query2 .= " WHERE (areaEstrategica = '".$_POST['buscaarea']."')";
                  }else{
                      if ($_POST["buscanivel"] != '' ){
                          $query .= " WHERE nivel = '".$_POST["buscanivel"]."' ";
                          $query2 .= " WHERE nivel = '".$_POST["buscanivel"]."' ";
                      }
                  }              
              }
          }
          if ($_POST["orden"] == '1' ){
              $query .= " ORDER BY nombre ASC ";
              $query2 .= " ORDER BY nombre ASC ";
          }elseif ($_POST["orden"] == '2' ){
              $query .= " ORDER BY autorizado DESC ";
              $query2 .= " ORDER BY autorizado DESC ";
          }elseif ($_POST["orden"] == '3' ){
              $query .= " ORDER BY areaEstrategica ASC ";
              $query2 .= " ORDER BY areaEstrategica ASC ";
          }elseif ($_POST["orden"] == '4' ){
              $query .= " ORDER BY nivel ASC ";
              $query2 .= " ORDER BY nivel ASC ";
          }elseif ($_POST["orden"] == '5' ){
              $query .= " ORDER BY promedio DESC ";
              $query2 .= " ORDER BY promedio DESC ";
          }
            $productosPorPagina = 6;
            $pagina = 1;
            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            }
            $limit = $productosPorPagina;
            $offset = ($pagina - 1) * $productosPorPagina;

            $query .=" LIMIT ? OFFSET ?";
            $query .=";";
            $query2 .=";";
            $sentencia = $base_de_datos->query($query2);
            $conteo = $sentencia->fetchObject()->conteo;
            $paginas = ceil($conteo / $productosPorPagina);
            $sentencia = $base_de_datos->prepare($query);
            $sentencia->execute([$limit, $offset]);
            $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
      ?>
      <div class="col-9">
        <div class="card-group">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($productos as $producto){?>
              <div class="card">
                <div class="card-header">                  
                  <h5 class="card-title p1-color"><?php  echo $producto->nombre; ?></h5>
                </div>
                <div class="card-body text-center">
                    <p class="card-text p1-color"><?php  echo $producto->descripcion; ?></p>
                    
                </div>
                <div class="card-footer">
                <a class="btn btn-primary" href="verMas_proyecto_admin.php?id=<?php echo $producto->id;?>">Ver más</a>
                          <a class="btn btn-danger" href="deleteProyectos.php?id=<?php echo $producto->id;?>">Eliminar</a>
                          <?php
                            if ($colum['autorizado'] == 0){?>
                              <a href="aprobarProyectosAdmin.php?id=<?php echo $producto->id;?>" class="btn btn-primary btn-success">Aprobar</a>
                          <?php }elseif(($colum['autorizado'] != 0)){?>
                              <a href="calificar_admin.php?id=<?php echo $producto->id;?>" class="btn btn-primary btn-success">Calificar</a>
                          <?php }
                          ?>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <p>Mostrando <?php 
      if($conteo < $productosPorPagina){
        echo $conteo ?> de <?php echo $conteo ?> productos disponibles</p>
      <?php }else{
        echo $productosPorPagina ?> de <?php echo $conteo ?> productos disponibles</p>
      <?php } ?>
    </div>
    <div class="col-xs-12 col-sm-6">
      <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
    </div>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <?php if ($pagina > 1){ ?>
        <li class="page-item">
          <a class="page-link" href="ver_proyectos_Admin.php?pagina=<?php echo $pagina - 1 ?>" tabindex="-1">Previous</a>
        </li>
      <?php } ?>
      <?php for($x=1; $x <= $paginas; $x++) {?>
        <li class="page-item"><a class="page-link" href="ver_proyectos_Admin.php?pagina=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php } ?>
      <?php if($pagina < $paginas) { ?>
      <li class="page-item">
        <a class="page-link" href="ver_proyectos_Admin.php?pagina=<?php echo $pagina + 1 ?>">Next</a>
      </li>
      <?php } ?>
    </ul>
  </nav>
</body>
</html>