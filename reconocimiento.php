<?php
  require_once 'restrictedEstudiante.php';
  require 'vendor/autoload.php';
  include 'database.php';
  $pdo = Database::connect();
  $sql = 'SELECT * FROM md1_estudiante WHERE matricula = ? ';
  $q = $pdo->prepare($sql);
  $q->execute(array($_SESSION['username']));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();


use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options;
$options -> setChroot(__DIR__);
$dompdf=new Dompdf($options);
$dompdf->setPaper("A4","landscape");
$html=file_get_contents("reconocimientoTemplate.php");
$html = str_replace("{{ name }}", $data['nombre'], $html);
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("documento.pdf", array('Attachment'=>'0'));
?>