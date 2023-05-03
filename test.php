<?php
        require_once 'restrictedEstudiante.php';
        include 'database.php';
        echo "hola";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM md1_estudiante WHERE  matricula = ?";
        $q = $pdo->prepare($sql);
        $rest= $q->execute(array($_SESSION['username']));
        echo "hola";
        Database::disconnect();
        echo "hola";
        
        echo $q->rowCount();
        if($q){
            echo "si";
            echo $_SESSION['username'] . '@tec.mx';
        }else{
            echo "no";
        }
        if(!empty($q)){
            echo "hola";
        }else{
            echo "no es así como jala";
        }
?>