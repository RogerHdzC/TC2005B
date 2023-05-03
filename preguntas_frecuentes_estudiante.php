<?php
  require_once 'restrictedEstudiante.php';
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


    <title>Preguntas Frecuentes</title>
</head>
<body class="p1-color">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
              <a class="navbar-brand" href="pagina_inicio_estudiantes.php">
              <img src="img/375-3752606_homepage-icon-house-logo-png-white.png" alt="" width="40" height="40">
            </a>
            <ul class="navbar-nav">
                
                <li class="nav-item"><a class="nav-link" href="registrar_proyecto_estudiante.php">Registrar Proyectos</a></li>
                <li class="nav-item"><a class="nav-link" href="mis_proyectos_Estudiante.php">Mis proyectos</a></li>
                <li class="nav-item"><a class="nav-link" href="explorar_proyectos_estudiante.php">Explorar Proyectos</a></li>
                <li class="nav-item"><a class="nav-link" href="resultados_estudiante.php">Resultados</a></li>
                <li class="nav-item"><a class="nav-link" href="ver_layout_estudiante.php">Ver mapa</a></li>
                <li class="nav-item"><a class="nav-link" href="anuncios_estudiantes.php">Anuncios</a></li>
                <li class="nav-item"><a class="nav-link" href="sobre_nosotros_estudiante.php">Sobre Nosotros</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="preguntas_frecuentes_estudiante.php">Preguntas Frecuentes</a></li>
                <li class="nav-item"><a class="nav-link" href="ajustes_estudiante.php">Ajustes</a></li>
    
              </ul>
              <a class="navbar-brand" href="logout.php">
            <img src="img/logout.png" alt="" width="40" height="40">
          </a>
            </div>

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
                    <b>¿Cual es el formato del Video?</b>
                    </a>
                </p>
                <div class="collapse" id="collapseExample3">
                    <div class="card card-body">
                     <ul>
                        <li>El formato de presentación de video es libre, refiriéndose esto a que puede ser en Canva, Power Point, utilizar los fondos asociados a cada área estratégica (BIO, NANO, NEXUS, CYBER), cortinilla de fondo y uno o varios participantes durante el video. Revisar materiales en: 
                        <a href="https://bit.ly/materialesExpoIng">Materiales</a></li>
                        <br>
                        <li>El video debe de contener las siguientes características: </li>
                           <ul>
                              <li>Ser un archivo MP4.</li>
                              <li><b>Para simplificar la verificación de los derechos de autor y evitar que tu video sea eliminado del canal de YouTube:</b></li>
                              <ul>
                                 <li>Utiliza música de la librería de YouTube o Bensound si consideras necesario incluir música de fondo.</li>
                                 <li>YouTube: Únicamente de la “Audio library”. Verifica en la columna “License type” que la pista musical sea gratuita.</li>
                                 <li>Bensound: Deben ser pistas que permitan la descarga con el botón negro DOWNLOAD (Free license with distribution).</li>
                                 <li>Para simplificar el proceso de verificación de derechos de autor, no usar música de otra procedencia.</li>
                                 <li>En ambos casos (Youtube o Bensound), incluir la atribución gratuita de uso de la pista musical en la sección de créditos, al final del video.</li>
                                 <li>La música debe ser instrumental, y no debe opacar la voz de quien esté hablando en el video.</li>
                                 <li><b>Youtube</b> (Música sin Copyright): <a href="https://www.youtube.com/playlist?list=PLzCxunOM5WFJ7sbHi_9Zwq2xOwtkYeZlx">Playlist</a></li>
                                 <li><b>Bensound</b> (Música sin Copyright): <a href="https://www.bensound.com/royalty-free-music">Playlist</a></li>
                              </ul>
                              <li>Ser compartido en la plataforma oficial del evento.</li>
                              <li>Utilizar el fondo asociado según el área estratégica en todo momento durante el video.</li>
                              <li>Utilizar formato de cortinilla institucional. Revisa</li>
                              <li>Tener una duración máxima de 3 minutos en formato horizontal.</li>
                           </ul>
                        <br>
                        <li>Aquellos videos que no cumplan las características anteriores serán descartados de la Expo Ingenierías.</li>
                        <br>
                     </ul>
                    </div>
                </div>
            <br>
                <p>
                    <a class="btn btn-primary btn-custom btn-p5" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                    <b>¿Cual es el formato del Póster?</b>
                    </a>
                </p>
                <div class="collapse" id="collapseExample4">
                    <div class="card card-body">
                    <ul>
                        <li>La plantilla de acuerdo al área estratégica la podrás encontrar en:  
                        <a href="https://docs.google.com/presentation/d/1ZJY_WfWoAF7g2DGhnc3mI0JnMpONxjby/edit#slide=id.p1">Fondo Para Póster</a></li>
                        <br>
                        <li>El contenido deberá ser el siguiente:</li>
                           <ul>
                           <li>Nombre del proyecto</li>
                           <li>Matrícula y nombre de los integrantes del equipo</li>
                           <li>Objetivo</li>
                           <li>Metodología</li>
                           <li>Conclusiones</li>
                           <li>Referencias bibliográficas</li>
                           </ul>
                     </ul>
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