<?php

	$contrasena = "122469";
	$usuario = "root";
	$nombre_base_de_datos = "test_proyecto";

	try{
	  $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contrasena);
	  $base_de_datos->query("set names utf8;");
	  $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
	  $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);	
	}catch (Exception $e) {
	  echo "Ocurrio algo con la base de datos: " . $e->getMessage();
	}

?>
