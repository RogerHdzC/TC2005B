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
        $sql = "DELETE FROM md1_docente WHERE nomina = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ver_usuarios_admin.php");
    }elseif($q2 > 0){

        $pdo = Database::connect();
        $sql = "DELETE FROM md1_jurado WHERE correo = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ver_usuarios_admin.php");
    }elseif($q3 > 0){
        $pdo = Database::connect();
        $sql = "DELETE FROM md1_estudiante WHERE matricula = ?";
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
              
              <form class="form-horizontal" action="deleteUsuario.php" method="post">
                <?php  
                ?>
                  <input type="hidden" name="id" value="<?php echo $id;?>"/>
                  <input type="hidden" name="q" value="<?php echo $q->rowCount();?>"/>
                  <input type="hidden" name="q2" value="<?php echo $q2->rowCount();?>"/>
                  <input type="hidden" name="q3" value="<?php echo $q3->rowCount();?>"/>
                  <p class="alert alert-error">Estas seguro que quieres eliminar este usuario ?</p>
                  <div class="form-actions">
                      <button type="submit" class="btn btn-light btn-custom">Si</button>
                      <a class="btn btn-danger" href="ver_usuarios_admin.php">No</button>
                      
                  </div>
              </form>
          </div>
    </div> <!-- /container -->
  </body>
</html>


