<?php

include 'database.php';

// Valor a verificar
$usuario = strtolower($_POST['user']);
$server = strtolower($_POST['server']);
$correo = $usuario . "@" . $server;

$password = $_POST['password'];
$url = strtolower($_POST['url']);

$response = array();

// Set the response header to indicate JSON content type
header('Content-Type: application/json');

if(strpos($url, "inicio_sesion_admin.html") !== false){

   $pdo = Database::connect();
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql ="SELECT * FROM md1_administrador WHERE correo = ?"; 
   $q = $pdo->prepare($sql);
   $q->execute(array($correo));
   $data = $q->fetch(PDO::FETCH_ASSOC);
   if ($q->rowCount() > 0){
      $response['correo'] = true;
       if (password_verify($password, $data['contraseña'])){            
         $response['exists'] = true;  
       }else{
         $response['exists'] = false; 
       }
   } else{
      $response['correo'] = false; 
   }
}

elseif(strpos($url, "inicio_sesion_docentejuez.html") !== false){

   if(($server == "tec.mx" && (!is_numeric($usuario[1]) || $usuario[0] == "l"))){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql ="SELECT * FROM md1_docente WHERE nomina = ?"; 
      $q = $pdo->prepare($sql);
      $q->execute(array($usuario));
      $data = $q->fetch(PDO::FETCH_ASSOC);
      if ($q->rowCount() > 0){
         $response['correo'] = true;
          if (password_verify($password, $data['contraseña'])){            
            $response['exists'] = true; 
          }else{
            $response['exists'] = false;
          }
      } else{
         $response['correo'] = false;
      }

  }elseif ($server != "tec.mx"){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql ="SELECT * FROM md1_jurado WHERE correo = ?"; 
      $q = $pdo->prepare($sql);
      $q->execute(array($usuario . '@' . $server));
      $data = $q->fetch(PDO::FETCH_ASSOC);
      if ($q->rowCount() > 0){
         $response['correo'] = true;
          if (password_verify($password, $data['contraseña'])){            
            $response['exists'] = true;
          }else{
            $response['exists'] = false;
          }
      } else{
         $response['correo'] = false;
      }
  }

}
elseif(strpos($url, "inicio_sesion_estudiante.html") !== false){

   if($server == "tec.mx" && $usuario[0] =="a" && is_numeric($usuario[1])){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql ="SELECT * FROM md1_estudiante WHERE matricula = ?"; 
      $q = $pdo->prepare($sql);
      $q->execute(array($usuario));
      $data = $q->fetch(PDO::FETCH_ASSOC);
      if ($q->rowCount() > 0){
         $response['correo'] = true;
          if (password_verify($password, $data['contraseña'])){            
            $response['exists'] = true;
          }else{
            $response['exists'] = false;
          }
          
      } else{
         $response['correo'] = false;
      }
  } 
}
Database::disconnect();
echo json_encode($response);

?>