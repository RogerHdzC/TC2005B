<?php
  require_once 'restrictedAdmin.php';
  include 'database.php';
  $id = '';
  if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
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

    echo $q->rowCount();
    echo $q2->rowCount();
    echo $q3->rowCount();

  if ( !empty($_POST)) {
    
    $id = $_POST['id'];
    echo "hola";
    echo $id . "es el id";

    if ($q->rowCount() > 0) {
        echo "hola";
        $pdo = Database::connect();
        $sql = "DELETE FROM md1_docente WHERE nomina = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ver_usuarios_admin.php");
    }elseif($q2->rowCount() > 0){
      echo "hola";
        $pdo = Database::connect();
        $sql = "DELETE FROM md1_jurado WHERE correo = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ver_usuarios_admin.php");
    }elseif($q3->rowCount() > 0){
      echo "hola";
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
                                          echo $colum['nomina'];
                                          echo $colum['correo'];
                                          echo $colum['matricula'];
                                          echo $id;
                ?>
                  <input type="hidden" name="id" value="<?php 
                      if ($q->rowCount() > 0) {
                        echo $colum['nomina'];
                    }elseif($q2->rowCount() > 0){
                        echo $colum['correo'];
                    }elseif($q3->rowCount() > 0){
                        echo $colum['matricula'];
                    } 
                  ?>'"/>
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
