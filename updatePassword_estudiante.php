<?php
  include 'database.php';
    
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'Exception.php';
  require 'PHPMailer.php';
  require 'SMTP.php';

echo "hola 1";
if(isset($_POST['forgotSubmit'])){
    echo "hola 2";
	//check whether email is empty
    if(!empty($_POST['username'])){
        echo "hola 3";
		//check whether user exists in the database
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM md1_estudiante WHERE  matricula = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($_POST['username']));
        Database::disconnect();

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql2 = "SELECT * FROM md1_docente WHERE  nomina = ?";
        $q2 = $pdo->prepare($sql2);
        $q2->execute(array($_POST['username']));
        Database::disconnect();

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql3 = "SELECT * FROM md1_jurado WHERE  correo = ?";
        $q3 = $pdo->prepare($sql3);
        $q3->execute(array($_POST['username']."@".$_POST['server']));
        Database::disconnect();

		if($q->rowCount() > 0){
            echo "hola 4";
			//generat unique string
			$uniqidStr = md5(uniqid(mt_rand()));;
			//update data with forgot pass code
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `md1_estudiante` SET `olvido_pass_iden` = ? WHERE `md1_estudiante`.`matricula` = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($uniqidStr, $_POST['username']));

			if($q){
                echo "hola 5";
				$resetPassLink = 'http://ing.pue.itesm.mx/TC2005B_401_1/ReiniciarPassword.php?fp_code='.$uniqidStr;
				
				//get user details
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM md1_estudiante WHERE  matricula = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['username']));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                Database::disconnect();
                echo "hola 6";
				//send reset password email
				$to = $data['matricula'] . '@tec.mx';
                echo "hola 7";
				$subject = "Solicitud de actualizacion de contrasena";
				$mailContent = 'Estimado '.$data['nombre'].', 
				<br/>Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.
				<br/>Para restablecer su contraseña, visite el siguiente enlace: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
				<br/><br/>Saludos,
				<br/>Expo Ing';
				//send email
                echo "hola 8";
                echo  $to;				
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = 'base64';
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'hdc.rogelio@gmail.com';
                $mail->Password = 'enstrylmtgchvbxb';
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->isHTML(true);
                $mail->setFrom('hdc.rogelio@gmail.com', 'Rogelio');
                $mail->addAddress($to);
                $mail->Subject = ("$to ($subject)");
                $mail->Body = $mailContent;
                $mail->send();
				$sessData['estado']['type'] = 'success';
				$sessData['estado']['msg'] = 'Por favor revise su correo electrónico, hemos enviado un enlace de restablecimiento de contraseña a su correo electrónico registrado.';
                
            }else{
				$sessData['estado']['type'] = 'error';
				$sessData['estado']['msg'] = 'Some problem occurred, please try again.';
			}
		}elseif($q2->rowCount()>0){
            echo "hola 4";
			//generat unique string
			$uniqidStr = md5(uniqid(mt_rand()));;
			//update data with forgot pass code
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `md1_docente` SET `olvido_pass_iden` = ? WHERE `md1_docente`.`nomina` = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($uniqidStr, $_POST['username']));

			if($q){
                echo "hola 5";
				$resetPassLink = 'http://ing.pue.itesm.mx/TC2005B_401_1/ReiniciarPassword.php?fp_code='.$uniqidStr;
				
				//get user details
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM md1_docente WHERE  nomina = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['username']));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                Database::disconnect();
                echo "hola 6";
				//send reset password email
				$to = $data['nomina'] . '@tec.mx';
                echo "hola 7";
				$subject = "Solicitud de actualizacion de contrasena";
				$mailContent = 'Estimado '.$data['nombre'].', 
				<br/>Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.
				<br/>Para restablecer su contraseña, visite el siguiente enlace: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
				<br/><br/>Saludos,
				<br/>Expo Ing';
				//send email
                echo "hola 8";
                echo  $to;				
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = 'base64';
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'hdc.rogelio@gmail.com';
                $mail->Password = 'enstrylmtgchvbxb';
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->isHTML(true);
                $mail->setFrom('hdc.rogelio@gmail.com', 'Rogelio');
                $mail->addAddress($to);
                $mail->Subject = ("$to ($subject)");
                $mail->Body = $mailContent;
                $mail->send();
				$sessData['estado']['type'] = 'success';
				$sessData['estado']['msg'] = 'Por favor revise su correo electrónico, hemos enviado un enlace de restablecimiento de contraseña a su correo electrónico registrado.';
                
            }else{
				$sessData['estado']['type'] = 'error';
				$sessData['estado']['msg'] = 'Some problem occurred, please try again.';
			}
        }elseif($q3->rowCount()>0){
            echo "hola 4";
			//generat unique string
			$uniqidStr = md5(uniqid(mt_rand()));;
			//update data with forgot pass code
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `md1_jurado` SET `olvido_pass_iden` = ? WHERE `md1_jurado`.`correo` = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($uniqidStr, $_POST['username']."@".$_POST['server']));

			if($q){
                echo "hola 5";
				$resetPassLink = 'http://ing.pue.itesm.mx/TC2005B_401_1/ReiniciarPassword.php?fp_code='.$uniqidStr;
				
				//get user details
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM md1_jurado WHERE  correo = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['username']."@".$_POST['server']));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                Database::disconnect();
                echo "hola 6";
				//send reset password email
				$to = $data['correo'];
                echo "hola 7";
				$subject = "Solicitud de actualizacion de contrasena";
				$mailContent = 'Estimado '.$data['nombre'].', 
				<br/>Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.
				<br/>Para restablecer su contraseña, visite el siguiente enlace: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
				<br/><br/>Saludos,
				<br/>Expo Ing';
				//send email
                echo "hola 8";
                echo  $to;				
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = 'base64';
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'hdc.rogelio@gmail.com';
                $mail->Password = 'enstrylmtgchvbxb';
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->isHTML(true);
                $mail->setFrom('hdc.rogelio@gmail.com', 'Rogelio');
                $mail->addAddress($to);
                $mail->Subject = ("$to ($subject)");
                $mail->Body = $mailContent;
                $mail->send();
				$sessData['estado']['type'] = 'success';
				$sessData['estado']['msg'] = 'Por favor revise su correo electrónico, hemos enviado un enlace de restablecimiento de contraseña a su correo electrónico registrado.';
                
            }else{
				$sessData['estado']['type'] = 'error';
				$sessData['estado']['msg'] = 'Some problem occurred, please try again.';
			}
        }else{
			$sessData['estado']['type'] = 'error';
			$sessData['estado']['msg'] = 'El correo electrónico dado no está asociado con ninguna cuenta.'; 
		}
		
    }else{
        $sessData['estado']['type'] = 'error';
        $sessData['estado']['msg'] = 'Ingrese el correo electrónico para crear una nueva contraseña para su cuenta.'; 
    }
	//store reset password estado into the session
    $_SESSION['sessData'] = $sessData;
	//redirect to the forgot pasword page
    header("Location:enviar_password_estudiante.php");
}elseif(isset($_POST['resetSubmit'])){
	$fp_code = '';
	if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['fp_code'])){
		$fp_code = $_POST['fp_code'];
		//password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['estado']['type'] = 'error';
            $sessData['estado']['msg'] = 'Confirmar que la contraseña debe coincidir con la contraseña.'; 
        }else{
			//check whether identity code exists in the database
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM md1_estudiante WHERE  olvido_pass_iden = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($fp_code));
            Database::disconnect();

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql2 = "SELECT * FROM md1_docente WHERE  olvido_pass_iden = ?";
            $q2 = $pdo->prepare($sql2);
            $q2->execute(array($fp_code));
            Database::disconnect();

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql3 = "SELECT * FROM md1_jurado WHERE  olvido_pass_iden = ?";
            $q3 = $pdo->prepare($sql3);
            $q3->execute(array($fp_code));
            Database::disconnect();

            if($q->rowCount()>0){
				//update data with new password
                $password = $_POST["password"];
                $options = [
                    'cost' => 12,
                ];
                $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
                echo $password;
                echo $password_hash;
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE `md1_estudiante` SET `contraseña` = ? WHERE `md1_estudiante`.`olvido_pass_iden` = ? ";
                $q = $pdo->prepare($sql);
                $q->execute(array($password_hash, $fp_code));
                Database::disconnect();
				if($q){
					$sessData['estado']['type'] = 'success';
                    $sessData['estado']['msg'] = 'La contraseña de su cuenta se ha restablecido con éxito. Por favor inicie sesión con su nueva contraseña.';
				}else{
					$sessData['estado']['type'] = 'error';
					$sessData['estado']['msg'] = 'Ha ocurrido algún problema, por favor intente de nuevo.';
				}
            }elseif($q2->rowCount()>0){
                //update data with new password
                $password = $_POST["password"];
                $options = [
                    'cost' => 12,
                ];
                $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
                echo $password;
                echo $password_hash;
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE `md1_docente` SET `contraseña` = ? WHERE `md1_docente`.`olvido_pass_iden` = ? ";
                $q = $pdo->prepare($sql);
                $q->execute(array($password_hash, $fp_code));
                Database::disconnect();
				if($q){
					$sessData['estado']['type'] = 'success';
                    $sessData['estado']['msg'] = 'La contraseña de su cuenta se ha restablecido con éxito. Por favor inicie sesión con su nueva contraseña.';
				}else{
					$sessData['estado']['type'] = 'error';
					$sessData['estado']['msg'] = 'Ha ocurrido algún problema, por favor intente de nuevo.';
				}
            }elseif($q3->rowCount()>0){
                //update data with new password
                $password = $_POST["password"];
                $options = [
                    'cost' => 12,
                ];
                $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
                echo $password;
                echo $password_hash;
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE `md1_jurado` SET `contraseña` = ? WHERE `md1_jurado`.`olvido_pass_iden` = ? ";
                $q = $pdo->prepare($sql);
                $q->execute(array($password_hash, $fp_code));
                Database::disconnect();
				if($q){
					$sessData['estado']['type'] = 'success';
                    $sessData['estado']['msg'] = 'La contraseña de su cuenta se ha restablecido con éxito. Por favor inicie sesión con su nueva contraseña.';
				}else{
					$sessData['estado']['type'] = 'error';
					$sessData['estado']['msg'] = 'Ha ocurrido algún problema, por favor intente de nuevo.';
				}
            }else{
                $sessData['estado']['type'] = 'error';
                $sessData['estado']['msg'] = 'No está autorizado a restablecer una nueva contraseña de esta cuenta.';
            }
        }
    }else{
        $sessData['estado']['type'] = 'error';
        $sessData['estado']['msg'] = 'Todos los campos son obligatorios, por favor complete todos los campos.'; 
    }
	//store reset password estado into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['estado']['type'] == 'success')?'index.html':'ReiniciarPassword.php?fp_code='.$fp_code;
	//redirect to the login/reset pasword page
    header("Location:".$redirectURL);}
    ?>