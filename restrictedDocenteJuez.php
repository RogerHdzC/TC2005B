<?php
session_start();

            if(!isset($_SESSION['docente'])){
        
                header('Location: index.html');  
        
            }/*elseif(!isset($_SESSION['jurado'])){
                header('Location: index.html');  
            } */

?>