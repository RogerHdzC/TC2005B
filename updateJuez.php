<?php
  	require_once 'restrictedAdmin.php';
	require 'database.php';
	$id = 0;
	if ( !empty($_GET['id'])) {
		$id = base64_decode($_REQUEST['id']);
	}
    $juez=1;
	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE `md1_docente` SET `es_jurado` = ? WHERE `md1_docente`.`nomina` = ? ";
		$q = $pdo->prepare($sql);
		$q->execute(array($juez, $id));
		Database::disconnect();
		header("Location: ver_usuarios_admin.php");
	}
?>

<!DOCTYPE html>
head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <!-- BOOTSTRAP-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <!-- CSS -->
   <link href="css/general.css" rel="stylesheet">

   <title>Usuarios</title>
</head>

	<body>
	    <div class="container">
	    	<div class="span10 offset1">
	    		<div class="row">
			    	<h3>Asignar Juez</h3>
			    </div>
				<br>

			    <form class="form-horizontal" action="updateJuez.php" method="post">
		    		<input type="hidden" name="id" value="<?php echo $id?>"/>
					<p class="alert alert-error">¿Estas seguro que quieres asignar a este docente como juez ?</p>
					<br>
					<div class="form-actions">
                        <button type="submit" class="btn btn-success btn-custom btn-p7">Si</button>
						<button a class="btn btn-danger btn-p7" href="ver_usuarios_admin.php">No</button>	
					</div>
				</form>
			</div>