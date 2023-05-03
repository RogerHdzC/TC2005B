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

    <h1>Registro</h1>
    <br></br>
<?php
session_start();
# Aquí pon la clave secreta que obtuviste en la página de developers de Google
define("CLAVE_SECRETA", "6LdG5rklAAAAAIlSFmNJu44iJyIm23QhYc9jaaro");

# Comprobamos si enviaron el dato
if (!isset($_POST["g-recaptcha-response"]) || empty($_POST["g-recaptcha-response"])) {
    $sessData['estado']['type'] = 'error';
    $sessData['estado']['msg'] = 'Por favor realice el captcha.';
    $sessData['estado']['name'] = $_POST['nombreProfesor'];
    $sessData['estado']['ap'] = $_POST['apellidoPaterno'];
    $sessData['estado']['ah']=$_POST['apellidoMaterno'];
    $sessData['estado']['username']=$_POST['correoProfesor'];
    $sessData['estado']['server']=$_POST['serverProfesor'];
    $_SESSION['sessData'] = $sessData;
    header("Location:registro.php");
}

# Antes de comprobar usuario y contraseña, vemos si resolvieron el captcha
$token = $_POST["g-recaptcha-response"];
$verificado = verificarToken($token, CLAVE_SECRETA);
# Si no ha pasado la prueba
if ($verificado) {
    /**
     * Llegados a este punto podemos confirmar que el usuario
     * no es un robot. Aquí debes hacer lo que se deba hacer, es decir,
     * comprobar las credenciales, darle acceso, etcétera, pues
     * ya ha pasado el captcha
     */
    echo "Has completado la prueba :)";
} else {
    exit("Lo siento, parece que eres un robot");

}

/**
 * Verifica el token del captcha y regresa true o false
 * true en caso de que el usuario haya pasado la prueba
 * false en caso contrario
 * 
 * Más información: https://parzibyte.me/blog/2019/08/21/peticion-http-php-json-formulario/
 *
 * @author parzibyte
 * @see https://parzibyte.me/blog
 */
function verificarToken($token, $claveSecreta)
{
    # La API en donde verificamos el token
    $url = "https://www.google.com/recaptcha/api/siteverify";
    # Los datos que enviamos a Google
    $datos = [
        "secret" => $claveSecreta,
        "response" => $token,
    ];
    // Crear opciones de la petición HTTP
    $opciones = array(
        "http" => array(
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($datos), # Agregar el contenido definido antes
        ),
    );
    # Preparar petición
    $contexto = stream_context_create($opciones);
    # Hacerla
    $resultado = file_get_contents($url, false, $contexto);
    # Si hay problemas con la petición (por ejemplo, que no hay internet o algo así)
    # entonces se regresa false. Este NO es un problema con el captcha, sino con la conexión
    # al servidor de Google
    if ($resultado === false) {
        # Error haciendo petición
        return false;
    }

    # En caso de que no haya regresado false, decodificamos con JSON
    # https://parzibyte.me/blog/2018/12/26/codificar-decodificar-json-php/

    $resultado = json_decode($resultado);
    # La variable que nos interesa para saber si el usuario pasó o no la prueba
    # está en success
    $pruebaPasada = $resultado->success;
    # Regresamos ese valor, y listo (sí, ya sé que se podría regresar $resultado->success)
    return $pruebaPasada;
}

include 'database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
//hacemos llamado al input de formulario
$nombre = $_POST["nombreProfesor"] ;
$apellidoPaterno = $_POST["apellidoPaterno"] ;
$apellidoMaterno = $_POST["apellidoMaterno"] ;
$usuario = strtolower($_POST["correoProfesor"]) ;
$server = strtolower($_POST["serverProfesor"]) ;
$password = $_POST["password"];
$options = [
    'cost' => 12,
];
$password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
$nombreCompleto = $nombre . " " . $apellidoPaterno . " " . $apellidoMaterno;
$correo = $usuario . "@" . $server;



if($server == "tec.mx" && (!is_numeric($usuario[1]) || $usuario[0] == "l")){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM md1_docente WHERE nomina = ?"; 
    $q = $pdo->prepare($sql);
    $q->execute(array($usuario));
    if ($q->rowCount() > 0) {?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
        <p class="error">Este correo ya está Registrado!</p>
        </div>
        </div>
        <div class='container'>
                    <div class='row'>
                        <div class='col-8'>
                        <a href='inicio_sesion.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Iniciar Sesión</button></a>
                        </div>
                        <div class='col-4'>
                        <a href='index.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Inicio</button></a>
                        </div>
                     </div>
                 </div>
    <?php    Database::disconnect();
     } else{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql ="INSERT INTO md1_docente (nomina, nombre, contraseña)
        VALUES (?,?,?)"; 
        $q = $pdo->prepare($sql);
        $q->execute(array($usuario,$nombreCompleto,$password_hash));
        ?>
        <div class='card col-6 offset-3 text-white bg-primary' style='max-width: 80rem;'>
            <div class='card-body'>
                <h2 class='card-title'>¡Muy bien!</h2>
                <h3 class='card-text'>Detectamos que tu correo corresponde al de un usuario del Tecnológico de Monterrey. Acabamos de enviarte un correo de confirmación a <?php echo $usuario . "@" . $server; ?>.</p>
                <div class='container'>
                    <div class='row'>
                        <div class='col-8'>
                        <a href='inicio_sesion.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Iniciar Sesión</button></a>
                        </div>
                        <div class='col-4'>
                        <a href='index.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Inicio</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php Database::disconnect();
       if($q){
            $uniqidStr = md5(uniqid(mt_rand()));;

			//update data with forgot pass code
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `md1_docente` SET `olvido_pass_iden` = ? WHERE `md1_docente`.`nomina` = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($uniqidStr, $_POST['correoProfesor']));
            if($q){
                $resetPassLink = 'http://ing.pue.itesm.mx/TC2005B_401_1/AceptarUsuario.php?fp_code='.$uniqidStr;
				//get user details
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM md1_docente WHERE  nomina = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['correoProfesor']));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                Database::disconnect();
				//send reset password email
				$to = $data['nomina'] . '@tec.mx';
				$subject = "Solicitud de registro";
				$mailContent = 'Estimado '.$data['nombre'].', 
                <br/>Recientemente se envió una solicitud para registrarse.
                <br/>Visite el siguiente enlace: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
				<br/><br/>Saludos,
				<br/>Expo Ing';
				//send email
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = 'base64';
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'expoing12@gmail.com';
                $mail->Password = 'kyxzcjlvzvhvvuou';
                $mail->Port = 25;
                //$mail->SMTPSecure = 'ssl';
                $mail->isHTML(true);
                $mail->setFrom('expoing12@gmail.com', 'Expo Ingenierias');
                $mail->addAddress($to);
                $mail->Subject = ("$to ($subject)");
                $mail->Body = $mailContent;
                $mail->send();
                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                    echo 'Message has been sent';}
            }  
       }
     }
} elseif($server == "tec.mx" && $usuario[0] =="a" && is_numeric($usuario[1])){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM md1_estudiante WHERE matricula = ?"; 
    $q = $pdo->prepare($sql);
    $q->execute(array($usuario));
    if ($q->rowCount() > 0) {?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
        <p class="error">Este correo ya está Registrado!</p>
        </div>
        </div>
        <div class='container'>
        <div class='row'>
            <div class='col-8'>
                <a href='inicio_sesion.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Iniciar Sesión</button></a>
                </div>
                <div class='col-4'>
                <a href='index.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Inicio</button></a>
                </div>
            </div>
        </div>
        <?php Database::disconnect();
        
    } else{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql ="INSERT INTO md1_estudiante (matricula, nombre, contraseña)
        VALUES (?,?,?)"; 
        $q = $pdo->prepare($sql);
        $q->execute(array($usuario,$nombreCompleto,$password_hash));
        Database::disconnect();  ?>      
        <div class='card col-6 offset-3 text-white bg-primary' style='max-width: 80rem;'>
            <div class='card-body'>
                <h2 class='card-title'>¡Muy Bien!</h2>
                <h3 class='card-text'>Detectamos que tu correo corresponde al de un usuario del Tecnológico de Monterrey. Acabamos de enviarte un correo de confirmación a <?php echo $usuario . "@" . $server; ?></p>
                <div class='container'>
                    <div class='row'>
                        <div class='col-8'>
                        <a href='inicio_sesion.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Iniciar Sesión</button></a>
                        </div>
                        <div class='col-4'>
                        <a href='index.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Inicio</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if($q){
            $uniqidStr = md5(uniqid(mt_rand()));;
			//update data with forgot pass code
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `md1_estudiante` SET `olvido_pass_iden` = ? WHERE `md1_estudiante`.`matricula` = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($uniqidStr, $_POST['correoProfesor']));
            if($q){
                $resetPassLink = 'http://ing.pue.itesm.mx/TC2005B_401_1/AceptarUsuario.php?fp_code='.$uniqidStr;
				//get user details
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM md1_estudiante WHERE  matricula = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['correoProfesor']));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                Database::disconnect();
				//send reset password email
				$to = $data['matricula'] . '@tec.mx';
				$subject = "Solicitud de registro";
				$mailContent = 'Estimado '.$data['nombre'].', 
				<br/>Recientemente se envió una solicitud para registrarse.
                <br/>Visite el siguiente enlace: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
				<br/><br/>Saludos,
				<br/>Expo Ing';
				//send email
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = 'base64';
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'expoing12@gmail.com';
                $mail->Password = 'kyxzcjlvzvhvvuou';
                $mail->Port = 25;
                //$mail->SMTPSecure = 'ssl';
                $mail->isHTML(true);
                $mail->setFrom('expoing12@gmail.com', 'Expo Ingenierias');
                $mail->addAddress($to);
                $mail->Subject = ("$to ($subject)");
                $mail->Body = $mailContent;
                $mail->send();
                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                    echo 'Message has been sent';}
            }  
       } ?>
   <?php }    
} elseif($server != "tec.mx"){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM md1_jurado WHERE correo = ?"; 
    $q = $pdo->prepare($sql);
    $q->execute(array($correo));
    if ($q->rowCount() > 0) {?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
        <p class="error">Este correo ya está Registrado!</p>
        </div>
        </div>
        <div class='container'>
                    <div class='row'>
                        <div class='col-8'>
                        <a href='inicio_sesion.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Iniciar Sesión</button></a>
                        </div>
                        <div class='col-4'>
                        <a href='index.html'><button type='button' class='btn btn-primary btn-custom btn-p1'>Inicio</button></a>
                        </div>
                    </div>
                </div>
        <?php Database::disconnect();
    } else{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql ="INSERT INTO md1_jurado (correo, nombre, contraseña)
        VALUES (?,?,?)"; 
        $q = $pdo->prepare($sql);
        $q->execute(array($correo,$nombreCompleto,$password_hash));
       Database::disconnect(); ?>
       <div class='card col-6 offset-3 text-white bg-primary' style='max-width: 80rem;'>
        <div class='card-body'>
            <h2 class='card-title'>¡Muy bien!</h2>
            <h3 class='card-text'>Detectamos que tu correo no corresponde al de un usuario del Tecnológico de Monterrey. Acabamos de enviarle un correo de confirmación al administrador</p>
            <div class='container'>
                <div class='row'>
                    <div class='col-8'>
                    <button type='button' class='btn btn-dark btn-custom btn-p1 disabled' aria-disabled='true' >Iniciar Sesión</button>
                    </div>
                    <div class='col-4'>
                    <a href='index.html'><button type='button' class='btn btn-dark btn-custom btn-p1'>Inicio</button></a>
                    </div>
                </div>
            </div>
        </div>
     </div>
     <?php
        if($q){
            $uniqidStr = md5(uniqid(mt_rand()));;
			//update data with forgot pass code
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `md1_jurado` SET `olvido_pass_iden` = ? WHERE `md1_jurado`.`correo` = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($uniqidStr, $_POST['correoProfesor']."@".$server));
            if($q){
                $resetPassLink = 'http://ing.pue.itesm.mx/TC2005B_401_1/AceptarUsuario.php?fp_code='.$uniqidStr;
				
				//get user details
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM md1_jurado WHERE  correo = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['correoProfesor']."@".$server));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                Database::disconnect();
				//send reset password email
				$to = $data['correo'];
				$subject = "Solicitud de registro";
				$mailContent = 'Estimado '.$data['nombre'].', 
				<br/>Recientemente se envió una solicitud para registrarse.
                <br/>Visite el siguiente enlace: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
				<br/><br/>Saludos,
				<br/>Expo Ing';
				//send email
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = 'base64';
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'expoing12@gmail.com';
                $mail->Password = 'kyxzcjlvzvhvvuou';
                $mail->Port = 25;
                //$mail->SMTPSecure = 'ssl';
                $mail->isHTML(true);
                $mail->setFrom('expoing12@gmail.com', 'Expo Ingenierias');
                $mail->addAddress($to);
                $mail->Subject = ("$to ($subject)");
                $mail->Body = $mailContent;
                $mail->send();
                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                    echo 'Message has been sent';}
            }  
       } ?>
    <?php } 
    }
?>


</body>
</html>
