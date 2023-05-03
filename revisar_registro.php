<?php

include 'database.php';

// Valor a verificar
$usuario = strtolower($_POST['user']);
$server = strtolower($_POST['server']);
$correo = $usuario . "@" . $server;
$response = array();

// Set the response header to indicate JSON content type
header('Content-Type: application/json');

if(($server == "tec.mx" && (!is_numeric($usuario[1]) || $usuario[0] == "l"))){
   $pdo = Database::connect();
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql ="SELECT * FROM md1_docente WHERE nomina = ?"; 
   $q = $pdo->prepare($sql);
   $q->execute(array($usuario));
   if ($q->rowCount() > 0) {
      $response = array('exists' => true);
       Database::disconnect();
    } 
    else{
      $response = array('exists' => false);

       Database::disconnect();
    }
} elseif($server == "tec.mx" && $usuario[0] =="a" && is_numeric($usuario[1])){
   $pdo = Database::connect();
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql ="SELECT * FROM md1_estudiante WHERE matricula = ?"; 
   $q = $pdo->prepare($sql);
   $q->execute(array($usuario));
   if ($q->rowCount() > 0) {
   $response = array('exists' => true);
     Database::disconnect();
   } else{
      $response = array('exists' => false);
       Database::disconnect();  
     }    
} elseif($server != "tec.mx"){
   $pdo = Database::connect();
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql ="SELECT * FROM md1_jurado WHERE correo = ?"; 
   $q = $pdo->prepare($sql);
   $q->execute(array($correo));
   if ($q->rowCount() > 0) {
      $response = array('exists' => true);
     Database::disconnect();
   } else{
      $response = array('exists' => false);
      Database::disconnect(); 
     }
   } 

  Database::disconnect(); 
   echo json_encode($response);

?>


