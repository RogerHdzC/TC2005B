<?php
session_start();

    //Credenciales Mysql
        $Host = 'localhost';
        $Username = 'TC2005B_401_1';
        $Password = 'h9S0#t-B&0PH9rI#';
        $dbName = 'TC2005B_401_1';
    
        //Crear conexion con la abse de datos
        $db = new mysqli($Host, $Username, $Password, $dbName);
    
        // Cerciorar la conexion
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        $anuncio =$_POST['anuncio'];
    if(isset($_POST["submit"])){
        $revisar = getimagesize($_FILES["image"]["tmp_name"]);
        if($revisar !== false){
            $image = $_FILES['image']['tmp_name'];
            $imgContenido = addslashes(file_get_contents($image));
            $insertar = $db->query("INSERT into images_tabla (imagenes, creado) VALUES ('$imgContenido', now())");
            if($insertar){
                echo "Archivo Subido Correctamente.";
            }else{
                echo "Ha fallado la subida, reintente nuevamente.";
            } 
        }else{
            echo "Por favor seleccione imagen a subir.";
        }
        header('Location: ver_layout_admin.php');  
    }elseif(isset($_POST['subir_imagen'])){
        if(!empty($_FILES['image']['tmp_name']) && !empty($_POST['anuncio'])){
            $revisar = getimagesize($_FILES["image"]["tmp_name"]);
            echo "aqui ando";
            $image = $_FILES['image']['tmp_name'];
            $imgContenido = addslashes(file_get_contents($image));    
            echo "aqui ando";
    
            $insertar = $db->query("INSERT INTO `anuncios` (`id`, `anuncio`, `imagen`, `hora`) VALUES (NULL, '$anuncio', '$imgContenido', now())");
        }elseif(!empty($_POST['anuncio']) && empty($_FILES['image']['tmp_name'])){
            $insertar = $db->query("INSERT INTO `anuncios` (`id`, `anuncio`, `imagen`, `hora`) VALUES (NULL,'$anuncio',NULL,now())");
        }elseif(empty($_POST['anuncio']) && !empty($_FILES['image']['tmp_name'])){
            $revisar = getimagesize($_FILES["image"]["tmp_name"]);
            $image = $_FILES['image']['tmp_name'];
            $imgContenido = addslashes(file_get_contents($image));    
            $insertar = $db->query("INSERT INTO `anuncios` (`id`, `anuncio`, `imagen`, `hora`) VALUES (NULL,NULL,'$imgContenido',now())");
        }
        header('Location: anuncios_admin.php');  
    }elseif(isset($_POST['guardar'])){
        include 'database.php';
        echo $_POST['modelo'];
        echo "hola";
        echo $_POST['carrera'];
        echo "hola";
        echo $_POST['semestre'];
        echo "hola";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `md1_estudiante` SET `modelo` = ?,`carrera` = ?,`semestre` = ? WHERE `md1_estudiante`.`matricula` = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($_POST['modelo'],$_POST['carrera'],$_POST['semestre'],$_SESSION['username']));
        header('Location: ajustes_estudiante.php');  
    }elseif(isset($_POST['asignar'])){
        echo $_POST['califica1'];
        echo $_POST['califica2'];
        echo $_POST['califica3'];
        echo $_POST['id'];
        include 'database.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM md1_administrador WHERE correo = ? OR correo = ? OR correo = ?';
        $q1 = $pdo->prepare($sql);
        $q1->execute(array($_POST['califica1'],$_POST['califica2'],$_POST['califica3']));
        $sql2 = 'SELECT * FROM md1_jurado WHERE correo = ? OR correo = ? OR correo = ?';
        $q2 = $pdo->prepare($sql2);
        $q2->execute(array($_POST['califica1'],$_POST['califica2'],$_POST['califica3']));
        $sql3 = 'SELECT * FROM md1_docente WHERE nomina = ? OR nomina = ? OR nomina = ?';
        $q3 = $pdo->prepare($sql3);
        $q3->execute(array($_POST['califica1'],$_POST['califica2'],$_POST['califica3']));

        if(($q1->rowCount()==1 && $q2->rowCount()==1 && $q3->rowCount()==1)){
            echo "hola";
            $sql4 = 'SELECT * FROM md1_administrador WHERE correo = ?';
            $q4 = $pdo->prepare($sql4);
            $q4->execute(array($_POST['califica1']));
            echo "hola";
            $sql5 = 'SELECT * FROM md1_administrador WHERE correo = ?';
            $q5 = $pdo->prepare($sql5);
            $q5->execute(array($_POST['califica2']));
            echo "hola";
            $sql6 = 'SELECT * FROM md1_administrador WHERE correo = ?';
            $q6 = $pdo->prepare($sql6);
            $q6->execute(array($_POST['califica3']));
            echo "hola";
            if($q4->rowCount()==1){
                echo "hola2";
                $sql8 = 'SELECT * FROM md1_jurado WHERE correo = ?';
                $q8 = $pdo->prepare($sql8);
                $q8->execute(array($_POST['califica2']));
                $sql9 = 'SELECT * FROM md1_jurado WHERE correo = ?';
                $q9 = $pdo->prepare($sql9);
                $q9->execute(array($_POST['califica3']));
                if($q8->rowCount()==1){ 
                    $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica1'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica2'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica3'],$_POST['id']));
                }else{
                    echo "hola3";
                    $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica1'],$_POST['id']));
                    echo "hola3";
                    $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica3'],$_POST['id']));
                    echo "hol43";
                    $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica2'],$_POST['id']));
                    echo "hola3";
                }
            }elseif($q5->rowCount()==1){
                echo "hola";
                $sql7 = 'SELECT * FROM md1_jurado WHERE correo = ?';
                $q7 = $pdo->prepare($sql7);
                $q7->execute(array($_POST['califica1']));
                $sql9 = 'SELECT * FROM md1_jurado WHERE correo = ?';
                $q9 = $pdo->prepare($sql9);
                $q9->execute(array($_POST['califica3']));
                if($q7->rowCount()==1){
                    $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica2'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica1'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica3'],$_POST['id']));

                }else{
                    $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica2'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica3'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica1'],$_POST['id']));
                }
            }else{
                echo "hola9";
                $sql7 = 'SELECT * FROM md1_jurado WHERE correo = ?';
                $q7 = $pdo->prepare($sql7);
                $q7->execute(array($_POST['califica1']));
                $sql8 = 'SELECT * FROM md1_jurado WHERE correo = ?';
                $q8 = $pdo->prepare($sql8);
                $q8->execute(array($_POST['califica2'])); 
                if($q7->rowCount()==1){
                    $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica3'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica1'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica2'],$_POST['id']));
                }else{
                    $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica3'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica2'],$_POST['id']));
                    $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_POST['califica3'],$_POST['id']));
                }
            }
          }elseif($q1->rowCount()==1 && $q2->rowCount()==2 && $q3->rowCount()==0){
            echo "aqui estoy";
            $sql4 = 'SELECT * FROM md1_administrador WHERE correo = ?';
            $q4 = $pdo->prepare($sql4);
            $q4->execute(array($_POST['califica1']));
            $sql5 = 'SELECT * FROM md1_administrador WHERE correo = ?';
            $q5 = $pdo->prepare($sql5);
            $q5->execute(array($_POST['califica2']));
            $sql6 = 'SELECT * FROM md1_administrador WHERE correo = ?';
            $q6 = $pdo->prepare($sql6);
            $q6->execute(array($_POST['califica3']));
            if($q4->rowCount()==1){
                echo "aqui estoy1";
                $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
            }elseif($q5->rowCount()==1){
                echo "aqui estoy2";
                $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
            }else{
                echo "aqui estoty";
                $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
            }
          }elseif($q1->rowCount()==0 && $q2->rowCount()==3 && $q3->rowCount()==0){
            $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['califica1'],$_POST['id']));
            $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['califica2'],$_POST['id']));
            $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['califica3'],$_POST['id']));
            header('Location: asigar_jueces.php'); 
          }elseif($q1->rowCount()==0 && $q2->rowCount()==2 && $q3->rowCount()==1){
            $sql10 = 'SELECT * FROM md1_docente WHERE nomina = ?';
            $q10 = $pdo->prepare($sql10);
            $q10->execute(array($_POST['califica1']));
            $sql11 = 'SELECT * FROM md1_docente WHERE nomina = ?';
            $q11 = $pdo->prepare($sql11);
            $q11->execute(array($_POST['califica2']));
            $sql2 = 'SELECT * FROM md1_docente WHERE nomina = ?';
            $q12 = $pdo->prepare($sql12);
            $q11->execute(array($_POST['califica3']));
            if($q10->rowCount()==1){
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
            }elseif($q11->rowCount()==1){
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
            }else{
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
            }
          }elseif($q1->rowCount()==0 && $q2->rowCount()==1 && $q3->rowCount()==2){
            $sql7 = 'SELECT * FROM md1_jurado WHERE correo = ?';
            $q7 = $pdo->prepare($sql7);
            $q7->execute(array($_POST['califica1']));
            $sql8 = 'SELECT * FROM md1_jurado WHERE correo = ?';
            $q8 = $pdo->prepare($sql8);
            $q8->execute(array($_POST['califica2']));
            $sql9 = 'SELECT * FROM md1_jurado WHERE correo = ?';
            $q9 = $pdo->prepare($sql9);
            $q9->execute(array($_POST['califica3']));
            if($q7->rowCount()==1){
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
            }elseif($q8->rowCount()==1){
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
            }else{
                $sql = "INSERT INTO `md1_evaluaJurado` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
            }
          }elseif($q1->rowCount()==0 && $q2->rowCount()==0 && $q3->rowCount()==3){
            $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['califica1'],$_POST['id']));
            $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['califica2'],$_POST['id']));
            $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['califica3'],$_POST['id']));
          }elseif($q1->rowCount()==1 && $q2->rowCount()==0 && $q3->rowCount()==2){
            $sql4 = 'SELECT * FROM md1_administrador WHERE correo = ?';
            $q4 = $pdo->prepare($sql4);
            $q4->execute(array($_POST['califica1']));
            $sql5 = 'SELECT * FROM md1_administrador WHERE correo = ?';
            $q5 = $pdo->prepare($sql5);
            $q5->execute(array($_POST['califica2']));
            $sql6 = 'SELECT * FROM md1_administrador WHERE correo = ?';
            $q6 = $pdo->prepare($sql6);
            $q6->execute(array($_POST['califica3']));
            if($q4->rowCount()==1){
                $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
            }elseif($q5->rowCount()==1){
                $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
            }else{
                $sql = "INSERT INTO `md1_evaluaAdministrador` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica3'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica1'],$_POST['id']));
                $sql = "INSERT INTO `md1_evaluaDocente` (`idJurado`, `idProyecto`, `rubrica1`, `rubrica2`, `rubrica3`) VALUES (?, ?, NULL, NULL, NULL)";
                $q = $pdo->prepare($sql);
                $q->execute(array($_POST['califica2'],$_POST['id']));
            }
          }
          header('Location: asignar_jueces.php');
    }
?>