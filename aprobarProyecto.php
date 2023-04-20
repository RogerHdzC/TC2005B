<?php
    require_once 'restrictedDocenteJuez.php';
    include 'database.php';
    $autorizado=1;
    $id = 0;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( !empty($_POST)) {
        echo $id;
        echo $autorizado;
        $id = $_POST['id'];
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `md1_proyecto` SET `autorizado` = ? WHERE `md1_proyecto`.`id` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($autorizado, $id));		

        Database::disconnect();
		header("Location: ver_pryectos_Admin.php");
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
			    	<h3>Aprobar un proyecto</h3>
			    </div>

			    <form class="form-horizontal" action="aprobarProyectoAdmin.php" method="post">
		    		<input type="hidden" name="id" value="<?php echo $id;?>"/>
					<p class="alert alert-error">Estas seguro que quieres aprobar este proyecto ?</p>
					<div class="form-actions">
                        <button type="submit" class="btn btn-light btn-custom">Si</button>
						<a class="btn btn-danger" href="ver_proyectos_Admin.php">No</button>
						
					</div>
				</form>
			</div>
	  </div> <!-- /container -->
	</body>
</html>