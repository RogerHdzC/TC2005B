<?php
  session_start();
  $sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
	if(!empty($sessData['estado']['msg'])){
		$statusMsg = $sessData['estado']['msg'];
		$statusMsgType = $sessData['estado']['type'];
		unset($_SESSION['sessData']['estado']);
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
   <!-- BOOTSTRAP ICONS-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
   <!-- CSS -->
   <link href="css/general.css" rel="stylesheet">
   
   
   <title>Iniciar Sesión</title>
</head>
<body>   
	<div class="col-sm-3 r-form-1-box wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
	<div class="col-sm-6 r-form-1-box wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">

		<h2>USUARIO REGISTRO Y LOGIN </h2>
			<h4>Ingrese Email de su cuenta a reniciar nuevo Password</h4>
			<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
			<div class="regisFrm">
				<form action="updatePassword_estudiante.php" method="post">
				<div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="Username" name="username" id="correoProfesor">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" placeholder="" aria-label="Server" name="server" id="serverProfesor">
			</div>
					<div class="send-button">
						<input type="submit" name="forgotSubmit" value="CONTINUAR">
						<button type="button" class="btn btn-primary btn-custom btn-de-estado" onclick="document.location='index.html'">Ir al inicio</button>  
					</div>
				</form>
			</div>
	</div>
	<div class="col-sm-3 r-form-1-box wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</body>

