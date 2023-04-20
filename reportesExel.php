<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=documento_exportado_" . date('Y:m:d:m:s').".xls");
	header("Pragma: no-cache"); 
	header("Expires: 0");

    include 'database.php';
    $pdo = Database::connect();

	$output = "";
	
	if(ISSET($_POST['export'])){
		$output .="
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
			
		$output .= "
					<tr>
						<td>".$colum['matricula']."</td>
						<td>".$colum['nombre']."</td>
					</tr>
		";
		}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	}
	
?>