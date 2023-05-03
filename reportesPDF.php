<?php 
  require 'vendor/autoload.php';
  $consulta = "SELECT * FROM md1_estudiante";
  include 'database.php';
  $pdo = Database::connect();

$html = "";

  $html .="
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
      </tr>
    <tbody>
";

$consulta = "SELECT * FROM `md1_estudiante`";
    foreach ($pdo->query($consulta) as $colum){
  
$html .= "
      <tr>
        <td>".$colum['matricula']."</td>
        <td>".$colum['nombre']."</td>
      </tr>
";
}

$html .="
    </tbody>
    
  </table>
";

echo $output;


use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options;
$options -> setChroot(__DIR__);
$dompdf=new Dompdf($options);
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("documento.pdf", array('Attachment'=>'0'));

?>
