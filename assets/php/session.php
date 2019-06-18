<?php
    session_start();
    
    if(!isset($_SESSION['banco']) && empty($_SESSION['banco'])){
        header("Location: ../../index.php");
        exit;
    }
?>