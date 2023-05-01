<?php
  require_once 'restrictedDocenteJuez.php';
  include 'database.php';
  $pdo = Database::connect();
  $sql = 'SELECT * FROM md1_docente WHERE nomina = ? ';
  $q = $pdo->prepare($sql);
  $q->execute(array($_SESSION['docente']));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();
  $pdo = Database::connect();
  $sql2 = 'SELECT * FROM md1_jurado WHERE correo = ? ';
  $q2 = $pdo->prepare($sql2);
  $q2->execute(array($_SESSION['docente']));
  $data2 = $q2->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();

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
    
    <title>EXplorar Proyectos</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <a class="navbar-brand" href="pagina_inicio_docenteJuez.php">
          <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
        </a>
        <ul class="navbar-nav">
            <?php if($data2['correo']!= $_SESSION['docente']){?>
            <li class="nav-item"><a class="nav-link"  href="mis_proyectos_docenteJuez.php">Mis proyectos</a></li>
            <?php }?>
            <?php if(($data['es_jurado']==1) || ($data2['correo']== $_SESSION['docente'])){?>
              <li class="nav-item"><a class="nav-link"  href="proyectosa_calificar.php">Proyectos a Calificar</a></li>
            <?php }?>
            <li class="nav-item"><a class="nav-link active" aria-current="page"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link"  href="ver_layout_docenteJuez.php">Ver mapa</a></li>
            <li class="nav-item"><a class="nav-link" href="anuncios_docenteJuez.php">Anuncios</a></li>
            <li class="nav-item"><a class="nav-link"  href="sobre_nosotros_docenteJuez.php">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link"  href="preguntas_frecuentes_docenteJuez.php">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a class="nav-link"  href="ajustes_docenteJuez.php">Ajustes</a></li>
          </ul>
          <a class="navbar-brand" href="logout.php">
            <img src="img/logout.png" alt="" width="40" height="40">
          </a>
        </div>
    </div>
  </nav>

  <br>
  <h1>Explorar Proyectos</h1> 
  <div class="container">
    <div class="row">
      <div class="col-3 col-3-p">
        <form id="form2" name="form2" method="POST" action="explorar_proyectos_docentejuez.php">
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
          $query ="SELECT * FROM md1_proyecto WHERE borrado IS NULL";
          $query2 = "SELECT count(*) as conteo FROM md1_proyecto WHERE borrado IS NULL";
        }else{
              $query ="SELECT * FROM md1_proyecto WHERE borrado IS NULL";
              $query2 = "SELECT count(*) as conteo FROM md1_proyecto WHERE borrado IS NULL";
              if ($_POST["buscadepartamento"] != '' ){
                  $query .= " AND ((autorizado = '".$_POST['buscadepartamento']."') OR (promedio > '".$_POST['buscadepartamento']."'))";
                  $query2 .= " AND ((autorizado = '".$_POST['buscadepartamento']."') OR (promedio > '".$_POST['buscadepartamento']."'))";
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
                      $query .= " AND (areaEstrategica = '".$_POST['buscaarea']."')";
                      $query2 .= " AND (areaEstrategica = '".$_POST['buscaarea']."')";
                  }else{
                      if ($_POST["buscanivel"] != '' ){
                          $query .= " AND nivel = '".$_POST["buscanivel"]."' ";
                          $query2 .= " AND nivel = '".$_POST["buscanivel"]."' ";
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
      <div class="col-9 col-9-p">
        <div class="container">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($productos as $producto){?>
              <div class="col">
                <div class="card h-100">
                  <div class="card-header">                  
                    <h5 class="card-title p1-color"><?php  echo $producto->nombre; ?></h5>
                  </div>
                  <div class="card-body text-center">
                      <p class="card-text p1-color"><?php  echo $producto->descripcion; ?></p>
                      
                  </div>
                  <div class="card-footer"><a class="btn btn-primary" href="verMas_proyecto_docenteJuez.php?id=<?php echo base64_encode($producto->id);?>">Ver más</a></div>
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
          <a class="page-link" href="explorar_proyectos_docentejuez.php?pagina=<?php echo $pagina - 1 ?>" tabindex="-1">Previous</a>
        </li>
      <?php } ?>
      <?php for($x=1; $x <= $paginas; $x++) {?>
        <li class="page-item"><a class="page-link" href="explorar_proyectos_docentejuez.php?pagina=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php } ?>
      <?php if($pagina < $paginas) { ?>
      <li class="page-item">
        <a class="page-link" href="explorar_proyectos_docentejuez.php?pagina=<?php echo $pagina + 1 ?>">Next</a>
      </li>
      <?php } ?>
    </ul>
  </nav>
</body>
</html>