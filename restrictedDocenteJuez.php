<?php
session_start();

            if(!isset($_SESSION['username'])){
        
                header('Location: index.html');
                exit;
                
            } else {
                    // Show users the page!
                    header('Location: pagina_inicio_docenteJuez.html');
            }

?>