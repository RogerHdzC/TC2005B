<?php
    require_once 'restrictedAdmin.php';
    include 'database.php';
    $autorizado=1;
    $id = 0;
	if ( !empty($_GET['id'])) {
		$id = base64_decode($_REQUEST['id']);
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
		header("Location: ver_proyectos_Admin.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
           <!-- BOOTSTRAP-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<!-- CSS -->
		<link href="css/general.css" rel="stylesheet">
  </head>

	<body>
		<h3 class="aprobar-title">Aprobar un proyecto</h3>
	    <div class="container">
			<div class="row">
				<form class="form-horizontal" action="aprobarProyectosAdmin.php" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>"/>
					<p class="aprobar-title">Estas seguro que quieres aprobar este proyecto ?</p>
					<div class="form-actions">
						<button type="submit" class="aprobar-title btn btn-light btn-custom">Si</button>
						<a class="btn btn-danger aprobar-title" href="ver_proyectos_Admin.php">No</a>
						
					</div>
				</form>
			</div>
	  </div> <!-- /container -->
	</body>
</html>