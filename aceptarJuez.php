<?php
  	require_once 'restrictedAdmin.php';
	require 'database.php';
	$id = 0;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
    $juez=1;
	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE `md1_jurado` SET `confirmado` = ? WHERE `md1_jurado`.`correo` = ? ";
		$q = $pdo->prepare($sql);
		$q->execute(array($juez, $id));
		Database::disconnect();
		header("Location: ver_usuarios_admin.php");
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
			    	<h3>Asignar Juez</h3>
			    </div>

			    <form class="form-horizontal" action="aceptarJuez.php" method="post">
		    		<input type="hidden" name="id" value="<?php echo $id?>"/>
					<p class="alert alert-error">¿Estas seguro que quieres aceptar a este juez ?</p>
					<div class="form-actions">
                        <button type="submit" class="btn btn-light btn-custom">Si</button>
						<a class="btn btn-danger" href="ver_usuarios_admin.php">No</button>
						
					</div>
				</form>
			</div>
	  </div> <!-- /container -->
	</body>
</html>