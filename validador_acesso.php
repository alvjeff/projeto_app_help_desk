<?php
        session_start();

        if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
            header('Location: index.php?login=erro2');
            //echo $_SESSION['autenticado'];
        }
        
        echo $_SESSION['autenticado'];

       /**com isso vamos diminuir a redundancia de codigo, algo mais ou menos como ocorre com as css */
?>
 