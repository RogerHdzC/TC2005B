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

if($server){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM md1_administrador WHERE correo = ?"; 
    $q = $pdo->prepare($sql);
    $q->execute(array($correo));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    if ($q->rowCount() > 0){
        if (password_verify($password, $data['contraseña'])){            
            session_start();
            $_SESSION['admin'] = $data['correo'];
            header('Location:pagina_inicio_admin.php');     
        }else{
            header('Location:inicio_sesion_admin.html');     
        }
    } else{ ?>
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
        <a href="inicio_sesion_docentejuez.html"><button type="button" class="btn btn-primary btn-custom btn-p3">Intentar de nuevo</button></a>
        </div>
   <?php }
} else{?> 
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
        ¿Seguro que eres administrador?
        </div>
        </div>
        <div class="container">
        <br>
        <br>
        <a href="inicio_sesion_admin.html"><button type="button" class="btn btn-primary btn-custom btn-p3">Intentar de nuevo</button></a>
        </div>
<?php }
?>
