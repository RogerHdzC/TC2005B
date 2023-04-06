<?php
  require_once 'restrictedDocenteJuez.php';
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
    <link href="css/preguntasFrecuentes.css" rel="stylesheet">

    <title>Preguntas Frecuentes</title>
</head>
<body class="p1-color">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="mis_proyectos_docenteJuez.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="mis_proyectos_docenteJuez.php">Mis proyectos</a></li>
                <li class="nav-item"><a class="nav-link"  href="explorar_proyectos_docentejuez.php">Explorar Proyectos</a></li>
                <li class="nav-item"><a class="nav-link"  href="proyectosa_calificar.php">Proyectos a Calificar</a></li>
                <li class="nav-item"><a class="nav-link"  href="ver_layout_docenteJuez.php">Ver Layout</a></li>
                <li class="nav-item"><a class="nav-link" href="sobre_nosotros_docenteJuez.php">Sobre Nosotros</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page"  href="preguntas_frecuentes_docenteJuez.php">Preguntas Frecuentes</a></li>
                <li class="nav-item"><a class="nav-link"  href="ajustes_docenteJuez.php">Ajustes</a></li>
              </ul>
            </div>
            <a class="navbar-brand" href="pagina_inicio_docenteJuez.php">
              <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
            </a>
        </div>
      </nav>
    
<div class="container-fluid">
    <br>
    <h1 class="h1-p1">Preguntas Frecuentes</h1>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card text-white bg-primary">
                <div class="card-title card-p1-title">
                    Fechas Importantes
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header card-p2-header">
                    <p class='pfTitulo'><b>Postulaciones</b></p>
                    <p>1 Noviembre - 25 Noviembre</p>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header card-p2-header">
                    <p class='pfTitulo'><b>Asignación de Jurado y Espacios</b></p>
                    <p> 2 Diciembre</p>
                </div>
                
            </div>
            <br>
            <div class="card">
                <div class="card-header card-p2-header">
                    <p class='pfTitulo'><b>Expo-Ingenierias</b></p>
                    <p> 6 Diciembre</p>
                </div>
            </div>
            <br>
        </div>
        <div class="col-sm-6">
            <div class="card text-white bg-primary">
                <div class="card-title card-p1-title">
                    Tutoriales
                </div>
            </div>
            <br>
            
                <p>
                    <a class="btn btn-primary btn-custom btn-p5" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <b>¿Qué es la Expo-Ingenierías?</b>
                    </a>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        Evento realizado cada semestre donde los alumnos de la Escuela de Ingeniería del Tec presentan los mejores proyectos realizados a lo largo del semestre
                    </div>
                </div>
            <br>
                <p>
                    <a class="btn btn-primary btn-custom btn-p5" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                    <b>¿Cómo registrar un proyecto?</b>
                    </a>
                </p>
                <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            <br>
                <p>
                    <a class="btn btn-primary btn-custom btn-p5" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                    <b>¿Cómo ver los resultados de mi proyecto?</b>
                    </a>
                </p>
                <div class="collapse" id="collapseExample2">
                    <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            <br>
                <p>
                    <a class="btn btn-primary btn-custom btn-p5" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                    <b>¿Cómo ver los otros proyectos participantes?</b>
                    </a>
                </p>
                <div class="collapse" id="collapseExample3">
                    <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            <br>
                <p>
                    <a class="btn btn-primary btn-custom btn-p5" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                    <b>¿Cómo descargar mi reconocimiento?</b>
                    </a>
                </p>
                <div class="collapse" id="collapseExample4">
                    <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            <br>
        </div>
    </div>
</div>
</div>
<br>
</body>
</html>