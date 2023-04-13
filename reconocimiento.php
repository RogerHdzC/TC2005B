<?php
  require_once 'restrictedEstudiante.php';
  require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options;
$options -> setChroot(__DIR__);
$dompdf=new Dompdf($options);
$dompdf->setPaper("A4","landscape");
$html=file_get_contents("reconocimientoTemplate.php");
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("documento.pdf", array('Attachment'=>'0'));
?>