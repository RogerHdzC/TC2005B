<?php

include 'database.php';
$fp_code = '';
$id = 0;
$confirm=1;
if ( !empty($_GET['fp_code'])) {
    $fp_code = $_REQUEST['fp_code'];
}
echo "hola";
echo $fp_code;

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
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE `md1_estudiante` SET `correoConfirmado` = ? WHERE `md1_estudiante`.`olvido_pass_iden` = ? ";
                $q = $pdo->prepare($sql);
                $q->execute(array($confirm, $fp_code));
                Database::disconnect();
				if($q){
					$sessData['estado']['type'] = 'success';
                    $sessData['estado']['msg'] = 'La contraseña de su cuenta se ha restablecido con éxito. Por favor inicie sesión con su nueva contraseña.';
				}else{
					$sessData['estado']['type'] = 'error';
					$sessData['estado']['msg'] = 'Ha ocurrido algún problema, por favor intente de nuevo.';
				}
            }elseif($q2->rowCount()>0){
                echo "hola2";
                //update data with new password
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE `md1_docente` SET `correoConfirmado` = ? WHERE `md1_docente`.`olvido_pass_iden` = ? ";
                $q = $pdo->prepare($sql);
                $q->execute(array($confirm, $fp_code));
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
                echo "hola2";
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE `md1_jurado` SET `correoConfirmado` = ? WHERE `md1_jurado`.`olvido_pass_iden` = ? ";
                $q = $pdo->prepare($sql);
                $q->execute(array($confirm, $fp_code));
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

	//store reset password estado into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['estado']['type'] == 'success')?'index.html':'AceptarUsuario.php?fp_code='.$fp_code;
	//redirect to the login/reset pasword page
    header("Location:".$redirectURL);
    
    ?>