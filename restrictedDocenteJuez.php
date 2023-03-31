<?php
session_start();

            if(!isset($_SESSION['docente'])){
        
                header('Location: index.html');  
            } 

?>