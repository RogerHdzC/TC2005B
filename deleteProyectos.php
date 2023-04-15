<?php
  	require_once 'restrictedAdmin.php';
	require 'database.php';
	$id = 0;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		// delete data
		echo $id;
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO md1_proyectoBorrado (nombre,UF,areaEstrategica,descripcion,correoLider,correoCompañero1,correoCompañero2,correoCompañero3,correoCompañero4,correoProfesor,nivel,promedio,componeteDeEmprendimiento,idEdicion,autorizado,pdf,video)
		SELECT nombre,UF,areaEstrategica,descripcion,correoLider,correoCompañero1,correoCompañero2,correoCompañero3,correoCompañero4,correoProfesor,nivel,promedio,componeteDeEmprendimiento,idEdicion,autorizado,pdf,video 
		FROM md1_proyecto 
		WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));		
		$sql = "DELETE FROM md1_proyecto WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: ver_proyectos_Admin.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
        <link href="css/general.css" rel="stylesheet" type="text/css">

	    <link   href=	"css/bootstrap.min.css" rel="stylesheet">
	    <script src=	"js/bootstrap.min.js"></script>
	</head>

	<body>
	    <div class="container">
	    	<div class="span10 offset1">
	    		<div class="row">
			    	<h3>Eliminar un proyecto</h3>
			    </div>

			    <form class="form-horizontal" action="deleteProyectos.php" method="post">
		    		<input type="hidden" name="id" value="<?php echo $id?>"/>
					<p class="alert alert-error">Estas seguro que quieres eliminar este proyecto ?</p>
					<div class="form-actions">
                        <button type="submit" class="btn btn-light btn-custom">Si</button>
						<a class="btn btn-danger" href="ver_proyectos_Admin.php">No</button>
						
					</div>
				</form>
			</div>
	  </div> <!-- /container -->
	</body>
</html>