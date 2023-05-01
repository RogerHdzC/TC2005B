<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['estado']['msg'])){
    $statusMsg = $sessData['estado']['msg'];
    $statusMsgType = $sessData['estado']['type'];
    $statusName = $sessData['estado']['name'];
    $statusAP = $sessData['estado']['ap'];
    $statusAM = $sessData['estado']['ah'];
    $statusU = $sessData['estado']['username'];
    $statusS = $sessData['estado']['server'];
    unset($_SESSION['sessData']['estado']);
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>    
       <!-- BOOTSTRAP-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       <!-- BOOTSTRAP ICONS-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
      <!-- CSS -->
   <link href="css/general.css" rel="stylesheet">

    <title>Registro</title>
  </head>
  <body>
   
    <h1 class="inicio">Registro</h1>
 <?php echo !empty($statusMsg)?'<p class="text-warning">'.$statusMsg.'</p>':''; ?>
 <form action="respuesta_registro.php"  method="POST" id="signup">
    <div class="container validacion">
      <br>
      <div class="row">
        <div class="col-3 align-self-center">Nombre(s): </div>       
        <div class="col-9 align-self-center">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" <?php echo !empty($statusName)?'value='.$statusName.'':''; ?>  aria-label="Recipient's username" aria-describedby="button-addon2" name="nombreProfesor" id="nombreProfesor">
            
         </div>   
         <small></small>  
        </div>
        <br></br>
        <div class="col-3 align-self-center">Apellidos: </div>
        <div class="col-9 align-self-center">
          <div class="input-group mb-3">
            <input type="text" aria-label="First name"  class="form-control" name="apellidoPaterno" id="apellidoPaterno" <?php echo !empty($statusAP)?'value='.$statusAP.'':''; ?> >
            <input type="text" aria-label="Last name" class="form-control" name="apellidoMaterno" id="apellidoMaterno" <?php echo !empty($statusAM)?'value='.$statusAM.'':''; ?> >
            
          </div>
          <small></small>
        </div>
        <br></br>
        <div class="col-3 align-self-center">Correo: </div>
        <div class="col-8 align-self-center">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" aria-label="Username" name="correoProfesor" id="correoProfesor" <?php echo !empty($statusU)?'value='.$statusU.'':''; ?> >
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" placeholder="" aria-label="Server" name="serverProfesor" id="serverProfesor" <?php echo !empty($statusS)?'value='.$statusS.'':'';?>  >
            
          </div>
          <small></small>
        </div>
        <br></br>
        <div class="col-3 align-self-center">Contraseña: </div>
        <div class="col-8 ">
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2" name="password" id="password" />
         </div> 
         <small></small>
        </div>
        <div class="col-1">
         <i class="bi bi-eye-slash" id="togglePassword"></i>
        </div>
 <div class="g-recaptcha" data-sitekey="6LdG5rklAAAAAKyIcrX9BPS7URpUz42APin-SGOe"></div>
              <div class="col-12 align-self-center">
              <br>
            <button type="submit" name="enviar" id="signup" class="btn btn-primary btn-custom btn-p3" >Registrarse</button>  
            </div>    
            <div class="col-12">
            <br>
            <button type="button" class="btn btn-primary btn-custom btn-p3" onclick="document.location='inicio_sesion.html'">Iniciar Sesión</button>  
            </div>  
        
      </div>
   </div>
  </form>
   <!-- SCRIPTS -->

    <script src="js/visibilidad_password.js"></script>
    <script src="js/validacion_registro.js"></script>


  </body>
</html>
