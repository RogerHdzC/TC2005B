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
						<th>ESTUDIANTES</th>
					</tr>

					<tr>
						<th>Matricula</th>
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
		
		$output .= "
						<tr>
							<th>DOCENTES</th> 
						</tr>
						<tr>
							<th>Nomina</th>
							<th>Nombre</th>
							<th>¿Fue jurado?</th>
						</tr>";

		$consulta = "SELECT * FROM `md1_docente`";
        foreach ($pdo->query($consulta) as $colum){
			
		$output .= "
						<tr>
							<td>".$colum['nomina']."</td>
							<td>".$colum['nombre']."</td>
							<td>".$colum['es_jurado']."</td>
						</tr>
		";
		}

		$output .= "
		<tr>
			<th>Jueces</th> 
		</tr>
		<tr>
			<th>Cooreo</th>
			<th>Nombre</th>
		</tr>";

		$consulta = "SELECT * FROM `md1_jurado`";
        foreach ($pdo->query($consulta) as $colum){
			
		$output .= "
						<tr>
							<td>".$colum['correo']."</td>
							<td>".$colum['nombre']."</td>
						</tr>
		";
		}

		$output .= "
		<tr>
			<th>Proyectos</th> 
		</tr>
		<tr>
			<th>Nombre</th>
			<th>UF</th>
			<th>AREA ESTRATÉGICA</th>
			<th>DESCRIPCIÓN</th>
			<th>CORREO DE LÍDER</th>
			<th>CORREO DE COMPAÑER@</th>
			<th>CORREO DE COMPAÑER@</th>
			<th>CORREO DE COMPAÑER@</th>
			<th>CORREO DE COMPAÑER@</th>
			<th>CORREO DEL PROFESOR ENCARGADO</th>
			<th>NIVEL DE DESARROLLO</th>
			<th>PROMEDIO</th>
			<th>¿TUVO COMPONENTE DE EMPRENDIMIENTO?</th>
			<th>EDICION</th>
			<th>URL DEL PDF</th>
			<th>URL DE VIDEO</th>
		</tr>";

		$consulta = "SELECT * FROM `md1_proyecto`";
        foreach ($pdo->query($consulta) as $colum){
			
		$output .= "
						<tr>
							<td>".$colum['nombre']."</td>
							<td>".$colum['UF']."</td>
							<td>".$colum['areaEstrategica']."</td>
							<td>".$colum['descripcion']."</td>
							<td>".$colum['correoLider']."</td>
							<td>".$colum['correoCompañero1']."</td>
							<td>".$colum['correoCompañero2']."</td>
							<td>".$colum['correoCompañero3']."</td>
							<td>".$colum['correoCompañero4']."</td>
							<td>".$colum['correoProfesor']."</td>
							<td>".$colum['nivel']."</td>
							<td>".$colum['promedio']."</td>
							<td>".$colum['comoponenteDeEmprendimiento']."</td>
							<td>".$colum['idEdicion']."</td>
							<td>".$colum['pdf']."</td>
							<td>".$colum['video']."</td>
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