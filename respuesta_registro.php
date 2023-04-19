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
    <link href="css/respuestaRegistro.css" rel="stylesheet">

    <title>Registro</title>
</head>
<body>
<br>
    <h1>Registro</h1>
    <br></br>
<?php

include 'database.php';
if (isset($_POST["inlineRadioOptions"])) {
   $esjurado = $_POST["inlineRadioOptions"];
}
//hacemos llamado al input de formulario
$nombre = $_POST["nombreProfesor"] ;
$apellidoPaterno = $_POST["apellidoPaterno"] ;
$apellidoMaterno = $_POST["apellidoMaterno"] ;
$usuario = $_POST["correoProfesor"] ;
$server = strtolower($_POST["serverProfesor"]) ;
$password = $_POST["password"];
$options = [
    'cost' => 12,
];
$password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
$nombreCompleto = $nombre . " " . $apellidoPaterno . " " . $apellidoMaterno;
$correo = $usuario . "@" . $server;



if(($server == "tec.mx" && !is_numeric($usuario[1]))){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM md1_docente WHERE nomina = ?"; 
    $q = $pdo->prepare($sql);
    $q->execute(array($usuario));
    if ($q->rowCount() > 0) {?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
        <p class="error">Este correo ya está Registrado!</p>
        </div>
        </div>
        <div class='container'>
                    <div class='row'>
                        <div class='col-6'>
                        <a href='inicio_sesion.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Iniciar Sesión</button></a>
                        </div>
                        <div class='col-6'>
                        <a href='index.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Inicio</button></a>
                        </div>
                     </div>
                 </div>
    <?php    Database::disconnect();
     } else{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql ="INSERT INTO md1_docente (nomina, nombre, contraseña, es_jurado)
        VALUES (?,?,?,?)"; 
        $q = $pdo->prepare($sql);
        $q->execute(array($usuario,$nombreCompleto,$password_hash,$esjurado));
        ?>
        <div class='card col-6 offset-3 text-white bg-primary' style='max-width: 80rem;'>
            <div class='card-body'>
                <h2 class='card-title'>¡Muy bien!</h2>
                <h3 class='card-text'>Detectamos que tu correo corresponde al de un usuario del Tecnológico de Monterrey. Acabamos de enviarte un correo de confirmación a <?php echo $usuario . "@" . $server; ?>.</p>
                <div class='container'>
                    <div class='row'>
                        <div class='col-6'>
                        <a href='inicio_sesion.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Iniciar Sesión</button></a>
                        </div>
                        <div class='col-6'>
                        <a href='index.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Inicio</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php Database::disconnect();
     }
} elseif($server == "tec.mx" && strtoupper($usuario[0])=="A" && is_numeric($usuario[1])){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM md1_estudiante WHERE matricula = ?"; 
    $q = $pdo->prepare($sql);
    $q->execute(array($usuario));
    if ($q->rowCount() > 0) {?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
        <p class="error">Este correo ya está Registrado!</p>
        </div>
        </div>
        <div class='container'>
        <div class='row'>
            <div class='col-6'>
                <a href='inicio_sesion.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Iniciar Sesión</button></a>
                </div>
                <div class='col-6'>
                <a href='index.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Inicio</button></a>
                </div>
            </div>
        </div>
        <?php Database::disconnect();
    } else{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql ="INSERT INTO md1_estudiante (matricula, nombre, contraseña)
        VALUES (?,?,?)"; 
        $q = $pdo->prepare($sql);
        $q->execute(array($usuario,$nombreCompleto,$password_hash));
        Database::disconnect();  ?>      
        <div class='card col-6 offset-3 text-white bg-primary' style='max-width: 80rem;'>
            <div class='card-body'>
                <h2 class='card-title'>¡Muy Bien!</h2>
                <h3 class='card-text'>Detectamos que tu correo corresponde al de un usuario del Tecnológico de Monterrey. Acabamos de enviarte un correo de confirmación a <?php echo $usuario . "@" . $server; ?></p>
                <div class='container'>
                    <div class='row'>
                        <div class='col-6'>
                        <a href='inicio_sesion.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Iniciar Sesión</button></a>
                        </div>
                        <div class='col-6'>
                        <a href='index.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Inicio</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <?php }    
} elseif($server != "tec.mx"){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM md1_jurado WHERE correo = ?"; 
    $q = $pdo->prepare($sql);
    $q->execute(array($correo));
    if ($q->rowCount() > 0) {?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
        <p class="error">Este correo ya está Registrado!</p>
        </div>
        </div>
        <div class='container'>
                    <div class='row'>
                        <div class='col-6'>
                        <a href='inicio_sesion.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Iniciar Sesión</button></a>
                        </div>
                        <div class='col-6'>
                        <a href='index.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Inicio</button></a>
                        </div>
                    </div>
                </div>
        <?php Database::disconnect();
    } else{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql ="INSERT INTO md1_jurado (correo, nombre, contraseña)
        VALUES (?,?,?)"; 
        $q = $pdo->prepare($sql);
        $q->execute(array($correo,$nombreCompleto,$password_hash));
       Database::disconnect(); ?>
       <div class='card col-6 offset-3 text-white bg-primary' style='max-width: 80rem;'>
        <div class='card-body'>
            <h2 class='card-title'>¡Muy bien!</h2>
            <h3 class='card-text'>Detectamos que tu correo no corresponde al de un usuario del Tecnológico de Monterrey. Acabamos de enviarle un correo de confirmación al administrador</p>
            <div class='container'>
                <div class='row'>
                    <div class='col-6'>
                    <button type='button' class='btn btn-dark btn-custom btn-p1 disabled' aria-disabled='true' >Iniciar Sesión</button>
                    </div>
                    <div class='col-6'>
                    <a href='index.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Inicio</button></a>
                    </div>
                </div>
            </div>
        </div>
     </div>
    <?php }
    }
?>


</body>
</html>

