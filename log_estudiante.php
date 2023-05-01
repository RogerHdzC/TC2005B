<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- BOOTSTRAP-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <!-- CSS -->
   <link href="css/general.css" rel="stylesheet">


    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include 'database.php';


$username = strtolower($_POST["username"]) ;
$server = strtolower($_POST["server"]) ;
$password = $_POST["password"];
$correo = $username . "@" . $server;

if($server == "tec.mx" && $username[0] =="a" && is_numeric($username[1])){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM md1_estudiante WHERE matricula = ?"; 
    $q = $pdo->prepare($sql);
    $q->execute(array($username));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    if ($q->rowCount() > 0 && $data['correoConfirmado'] == 1){
        if (password_verify($password, $data['contraseña'])){            
            session_start();
            $_SESSION['username'] = $data['matricula'];
            header('Location:pagina_inicio_estudiantes.php');     
        }else{
            header('Location:inicio_sesion_estudiante.html');     
            
        }
        
    } else{?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
        No tienes una cuenta registrada con este correo, intenta de nuevo o registrate
        </div>
        </div>
        <div class="container">
        <br>
        <br>
        <a href='registro.html'><button type='button' class='btn btn-primary btn-custom btn-p3'>Registrarme</button></a> 
        <br>
        <br>
        <a href="inicio_sesion_estudiante.html"><button type="button" class="btn btn-primary btn-custom btn-p3">Intentar de nuevo</button></a>
        </div>
    <?php }
} else{?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    ¿Seguro que eres estudiante?
    </div>
    </div>
    <div class="container">
    <br>
    <br>
    <a href='inicio_sesion_docentejuez.html'><button type='button' class='btn btn-primary btn-custom btn-p3'>Docente</button></a> 
    <br>
    <br>
    <a href='inicio_sesion_docentejuez.html'><button type='button' class='btn btn-primary btn-custom btn-p3'>Juez</button></a>
    <br>
    <br>
    <a href="inicio_sesion_estudiante.html"><button type="button" class="btn btn-primary btn-custom btn-p3">Intentar de nuevo</button></a>
    </div>
    <?php }
?>
