<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
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
   <link href="css/calificarAdmin.css" rel="stylesheet">
    <title>Calificar Proyecto</title>
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
                
                <li class="nav-item-admin"><a class="nav-link" href="ver_usuarios_admin.php">Ver Usuarios</a></li>
                <li class="nav-item-admin"><a class="nav-link" href="ver_proyectos_Admin.php">Ver Proyectos</a></li>
                <li class="nav-item-admin"><a class="nav-link" href="sobre_nosotros_admin.php">Sobre Nosotros</a></li>
                <li class="nav-item-admin"><a class="nav-link" href="preguntas_frecuentes_admin.php">Preguntas Frecuentes</a></li>
                <li class="nav-item-admin"><a class="nav-link" href="historicodatos.php">Historico de Datos</a></li>
                <li class="nav-item-admin"><a class="nav-link" href="ver_layout_admin.php">Layout</a></li>
                <li class="nav-item-admin"><a class="nav-link" href="ajustes_admin.php">Ajustes</a></li>
                
            </ul>
            <a class="navbar-brand" href="pagina_inicio_admin.php">
              <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
            </a>
            </div>
        </div>
      </nav>
      <br>
      <h1>Calificar Proyecto</h1>
      <br></br>
      <form class = "calificar" action="respuestacalificacionAdmin.php?id=<?php echo $id;?>"  method="POST" id="signup" enctype="multipart/form-data">
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
                    <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio1" value="1" required>
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio1" value="2" >
                    <label class="form-check-label" for="inlineRadio1">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio1" value="3" >
                    <label class="form-check-label" for="inlineRadio1">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio1" value="4" >
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
                    <input class="form-check-input" type="radio" name="pregunta2" id="inlineRadio2" value="1" required>
                    <label class="form-check-label" for="inlineRadio2">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta2" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta2" id="inlineRadio2" value="3">
                    <label class="form-check-label" for="inlineRadio2">3</label>
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
                <h2> Desarrollo experimental o técnico y/o resultados o producto final:</h2>
            </div>
            <div class="col-p1-12">
                Ausencia de errores técnicos los resultados y/o producto resuelven el problema propuesto.
            </div>
            <div class="col-p1-13">
                Deficiente&emsp;  
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio3" value="1" required>
                    <label class="form-check-label" for="inlineRadio3">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio3" value="2">
                    <label class="form-check-label" for="inlineRadio3">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio3" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                Excelente
            </div>
        </div>
        <br></br>
        <div class="row">
            <div class="col-p1-12">
                <h2> Claridad y precisión de ideas:</h2>
            </div>
            <div class="col-p1-12">
                La presentación es concreta y clara
            </div>
            <div class="col-p1-13">
                Deficiente&emsp;  
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta4" id="inlineRadio4" value="1" required>
                    <label class="form-check-label" for="inlineRadio4">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta4" id="inlineRadio4" value="2">
                    <label class="form-check-label" for="inlineRadio4">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta4" id="inlineRadio4" value="3">
                    <label class="form-check-label" for="inlineRadio4">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta4" id="inlineRadio4" value="4">
                    <label class="form-check-label" for="inlineRadio4">4</label>
                </div>
                Excelente
            </div>
        </div>
        <br></br>
        <div class="row">
            <div class="col-p1-12">
                <h2> Respuestas a preguntas:</h2>
            </div>
            <div class="col-p1-12">
            Respuestas precisas de acuerdo al diseño, al estado de avance del proyecto, al impacto y a los resultados obtenidos.
            </div>
            <div class="col-p1-13">
                Deficiente&emsp;  
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta5" id="inlineRadio5" value="1" required>
                    <label class="form-check-label" for="inlineRadio5">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta5" id="inlineRadio5" value="2">
                    <label class="form-check-label" for="inlineRadio5">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta5" id="inlineRadio5" value="3">
                    <label class="form-check-label" for="inlineRadio5">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta5" id="inlineRadio5" value="4">
                    <label class="form-check-label" for="inlineRadio5">4</label>
                </div>
                Excelente
            </div>
        </div>
    </div>
    <br></br>
    <button type="submit" class="btn btn-primary btn-custom btn-p2">Enviar Calificación</button>
    <br></br>
    </form>
</body>
</html>
