<?php

include 'database.php';

// Valor a verificar
$matricula = strtolower($_POST['matricula']);

$response = array();
// PDO
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql ="SELECT * FROM md1_estudiante WHERE matricula = ?"; 
$q = $pdo->prepare($sql);
$q->execute(array($matricula));
if ($q->rowCount() > 0) {
    $response['exists'] = true;
} else {
    $response['exists'] = false;
}
Database::disconnect();
echo json_encode($response);
?>
