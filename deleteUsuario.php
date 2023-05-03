<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
  $id = '';
  if ( !empty($_GET['id'])) {
      $id = base64_decode($_REQUEST['id']);
  }

    
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM md1_docente WHERE nomina = ?"; 
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Database::disconnect();

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 ="SELECT * FROM md1_jurado WHERE correo = ?"; 
    $q2 = $pdo->prepare($sql2);
    $q2->execute(array($id));
    Database::disconnect();

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql3 ="SELECT * FROM md1_estudiante WHERE matricula = ?"; 
    $q3 = $pdo->prepare($sql3);
    $q3->execute(array($id));
    Database::disconnect();


  if ( !empty($_POST)) {
    
    $id = $_POST['id'];
    $q = $_POST['q'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];

    if ($q > 0) {

        $pdo = Database::connect();
        $sql = "UPDATE `md1_docente` SET `borrado` = '1' WHERE `md1_docente`.`nomina` = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ver_usuarios_admin.php");
    }elseif($q2 > 0){

        $pdo = Database::connect();
        $sql = "UPDATE md1_jurado SET borrado = '1' WHERE correo = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ver_usuarios_admin.php");
    }elseif($q3 > 0){
        $pdo = Database::connect();
        $sql = "UPDATE md1_estudiante SET borrado = '1' WHERE matricula = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();

        header("Location: ver_usuarios_admin.php");
    }
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
    <h3 class="aprobar-title">Eliminar un usuario</h3>
      <div class="container">
        <div class="row">
          <form class="form-horizontal" action="deleteUsuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <input type="hidden" name="q" value="<?php echo $q->rowCount();?>"/>
              <input type="hidden" name="q2" value="<?php echo $q2->rowCount();?>"/>
              <input type="hidden" name="q3" value="<?php echo $q3->rowCount();?>"/>
              <p class="aprobar-title">Estas seguro que quieres eliminar este usuario ?</p>
              <div class="form-actions">
                <button type="submit" class="btn btn-light btn-custom aprobar-title">Si</button>
                <a class="btn btn-danger aprobar-title" href="ver_usuarios_admin.php">No</a>                      
              </div>
            </form>
          </div>
      </div>
  </body>
</html>


