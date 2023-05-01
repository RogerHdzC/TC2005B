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
  $id = 0;
if ( !empty($_GET['id'])) {
   $id = $_REQUEST['id'];
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
    
    <title>Calificar Proyecto</title>
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
            <li class="nav-item"><a class="nav-link"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
            <li class="nav-item"><a class="nav-link"  href="ver_layout_docenteJuez.php">Ver mapa</a></li>
            <li class="nav-item"><a class="nav-link" href="anuncios_docenteJuez.php">Anuncios</a></li>
            <li class="nav-item"><a class="nav-link"  href="sobre_nosotros_docenteJuez.php">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link"  href="preguntas_frecuentes_docenteJuez.php">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a class="nav-link"  href="ajustes_docenteJuez.php">Ajustes</a></li>
          </ul>
        </div>
        <a class="navbar-brand" href="logout.php">
          <img src="img/logout.png" alt="" width="40" height="40">
        </a>
    </div>
  </nav>

      <br>
      <h1>Calificar Proyecto</h1>
      <br></br>
      <form action="respuestacalificacionDocenteJuez.php?id=<?php echo $id;?>"  method="POST" id="signup" enctype="multipart/form-data">
    <div class="container">
       <div class="row">
            <div class="col-p1-12">
                <h2> Utilidad</h2>
            </div>
            <div class="col-p1-12">
                El proyecto resuelve un problema actual en el área de interés y/o el proyecto da alta prioridad al cliente quien queda ampliamente satisfecho.
            </div>
            <div class="col-p1-13">
                Deficiente&emsp; 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio1" value="2">
                    <label class="form-check-label" for="inlineRadio1">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio1" value="3">
                    <label class="form-check-label" for="inlineRadio1">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio1" value="4">
                    <label class="form-check-label" for="inlineRadio1">4</label>
                </div>
                Excelente
            </div>
        </div>
        <br></br>
        <div class="row">
            <div class="col-p1-12">
                <h2> Impacto e Innovación</h2>
            </div>
            <div class="col-p1-12">
                El proyecto presenta una idea nueva e impacta positivamente en el área de interés y/o el producto presenta una idea nueva e incrementa la productividad.
            </div>
            <div class="col-p1-13">
                Deficiente&emsp; 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta2" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta2" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta2" id="inlineRadio1" value="3">
                    <label class="form-check-label" for="inlineRadio1">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta2" id="inlineRadio2" value="4">
                    <label class="form-check-label" for="inlineRadio2">4</label>
                </div>
                Excelente
            </div>
        </div>
        <br></br>
        <div class="row">
            <div class="col-p1-12">
                <h2> Resultados del Producto Final</h2>
            </div>
            <div class="col-p1-12">
                Ausencia de errores técnicos los resultados y/o producto resuelven el problema propuesto.
            </div>
            <div class="col-p1-13">
                Deficiente&emsp;  
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio1" value="3">
                    <label class="form-check-label" for="inlineRadio1">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio2" value="4">
                    <label class="form-check-label" for="inlineRadio2">4</label>
                </div>
                Excelente
            </div>
        </div>
    </div>
    <br></br>
    <button type="submit" class="btn btn-primary btn-custom btn-p2">Enviar Calificación</button>
    </form>
    <br></br>
</body>
</html>