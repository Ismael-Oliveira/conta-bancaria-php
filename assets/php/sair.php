<?php
    session_start();
    
    if(isset($_SESSION['banco'])){
        
        unset($_SESSION['banco']);    
        unset($_SESSION['saldo']);
        unset($_SESSION['nome']);
        unset($_SESSION['id']);
        unset($_SESSION['agencia']);
        
        session_destroy();
        header("Location: ../../index.php");
        exit;
    }

?>