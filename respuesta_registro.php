<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="css/general.css" rel="stylesheet">
    <link href="css/respuestaRegistro.css" rel="stylesheet">

    <title>Registro</title>
</head>
<body>
<br></br>
    <br></br>
    <br></br>
    <h1>Registro</h1>
    <br></br>
<?php

//validamos datos del servidor
$user = "TC2005B_401_1";
$pass = "h9S0#t-B&0PH9rI#";
$host = "lab403azms01.itesm.mx";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$nombre = $_POST["nombreProfesor"] ;
$apellidoPaterno = $_POST["apellidoPaterno"] ;
$apellidoMaterno = $_POST["apellidoMaterno"] ;
$usuario = $_POST["correoProfesor"] ;
$server = $_POST["serverProfesor"] ;
$password = $_POST["password"];
$nombreCompleto = $nombre . " " . $apellidoPaterno . " " . $apellidoMaterno;
//verificamos la conexion a base datos
if(($server == "tec.mx"  && $usuario[0]!="A" )){
    //indicamos el nombre de la base datos
    $datab = "TC2005B_401_1";
    //indicamos selecionar ala base datos
    $db = mysqli_select_db($connection,$datab);
    //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
    $instruccion_SQL = "INSERT INTO md1_docente (nomina, nombre, contraseña)
                         VALUES ('$usuario','$nombreCompleto','$password')"; 
    $resultado = mysqli_query($connection,$instruccion_SQL);
    mysqli_close( $connection ); 
    echo "<div class='card col-6 offset-3 text-white bg-primary' style='max-width: 80rem;'>";
        echo "<div class='card-body'>";
            echo "<h2 class='card-title'>¡Muy bien!</h2>";
            echo "<h3 class='card-text'>Detectamos que tu correo corresponde al de un usuario del Tecnológico de Monterrey. Acabamos de enviarte un correo de confirmación a $usuario@$server.</p>";
            echo "<div class='container'>";
                echo "<div class='row'>";
                    echo "<div class='col-6'>";
                    echo "<a href='inicio_sesion.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Iniciar Sesión</button></a>";
                    echo "</div>";
                    echo "<div class='col-6'>";
                    echo "<a href='index.html.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Inicio</button></a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
} elseif($server == "tec.mx" && $usuario[0]=="A"){
    //indicamos el nombre de la base datos
    $datab = "TC2005B_401_1";
    //indicamos selecionar ala base datos
    $db = mysqli_select_db($connection,$datab);
    //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
    $instruccion_SQL = "INSERT INTO md1_estudiante (matricula, nombre, contraseña)
                            VALUES ('$usuario','$nombreCompleto','$password')";          
    $resultado = mysqli_query($connection,$instruccion_SQL);
    mysqli_close( $connection );
    echo "<div class='card col-6 offset-3 text-white bg-primary' style='max-width: 80rem;'>";
        echo "<div class='card-body'>";
            echo "<h2 class='card-title'>¡Muy bien!</h2>";
            echo "<h3 class='card-text'>Detectamos que tu correo corresponde al de un usuario del Tecnológico de Monterrey. Acabamos de enviarte un correo de confirmación a $usuario@$server.</p>";
            echo "<div class='container'>";
                echo "<div class='row'>";
                    echo "<div class='col-6'>";
                    echo "<a href='inicio_sesion.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Iniciar Sesión</button></a>";
                    echo "</div>";
                    echo "<div class='col-6'>";
                    echo "<a href='index.html.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Inicio</button></a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
} elseif($server != "tec.mx"){
    //indicamos el nombre de la base datos
    $datab = "TC2005B_401_1";
    //indicamos selecionar ala base datos
    $db = mysqli_select_db($connection,$datab);
    //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
    $instruccion_SQL = "INSERT INTO md1_jurado (correo, nombre, contraseña)
                            VALUES ('$usuario','$nombreCompleto','$password')";
    $resultado = mysqli_query($connection,$instruccion_SQL);
   
    mysqli_close( $connection );
    echo "<div class='card col-6 offset-3 text-white bg-primary' style='max-width: 80rem;'>";
    echo "<div class='card-body'>";
        echo "<h2 class='card-title'>¡Muy bien!</h2>";
        echo "<h3 class='card-text'>Detectamos que tu correo no corresponde al de un usuario del Tecnológico de Monterrey. Acabamos de enviarle un correo de confirmación al administrador</p>";
        echo "<div class='container'>";
            echo "<div class='row'>";
                echo "<div class='col-6'>";
                echo "<button type='button' class='btn btn-dark btn-custom btn-p1 disabled' aria-disabled='true' >Iniciar Sesión</button>";
                echo "</div>";
                echo "<div class='col-6'>";
                echo "<a href='index.html.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Inicio</button></a>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
echo "</div>";
}
   
//echo "Fuera " ;



?>


</body>
</html>

