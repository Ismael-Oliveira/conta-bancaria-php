<?php
    
    $dbs = "mysql:dbname=conta_bancaria_bd;host=localhost";
    $user = "root";
    $senha = "root";

    try {
        $pdo = new PDO($dbs, $user, $senha);
    } catch (PDOException $e) {
        echo "Erro de conexão ".$e;
    }
?>

