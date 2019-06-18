<?php
    session_start();

    require("./cabecario.php");
    require("./config.php");
    
    if(isset($_POST['agencia']) && !empty($_POST['agencia'])){
        
        $agencia = $_POST['agencia'];
        $conta = $_POST['conta'];
        $senha = md5($_POST['senha']);

        $sql = $pdo->prepare("SELECT * FROM conta WHERE agencia = ? AND conta_bank = ? AND senha = ?");
        
        $sql->bindParam(1, $agencia);
        $sql->bindParam(2, $conta);
        $sql->bindParam(3, $senha);
        
        $sql->execute();
        // print_r($sql);
        // echo $sql->rowCount();
        $res = $sql->fetch();
        
        if($sql->rowCount() > 0){
            // var_dump($res);
            $_SESSION['banco'] = $res['id'];
            $_SESSION['nome'] = $res['nome'];
            $_SESSION['saldo'] = $res['saldo'];
            $_SESSION['agencia'] = $res['agencia'];
            $_SESSION['conta'] = $res['conta_bank'];
            // var_dump($_SESSION['saldo']);
            header("Location: ../../index.php");
            exit;
        }

    }
?>
    <style>
        header a{
            display: none;
        }
    </style>
    <div class="main-form">
        <h2>Entre na sua agência</h2>
        <form method="post">
            <label for="agencia">Agência:</label><br>
            <input type="number" name="agencia" id="agencia_form">
            <br><br>
            <label for="conta">Conta:</label><br>
            <input type="number" name="conta" id="conta_form">
            <br><br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id="senha_form"><br><br>

            <input type="submit" value="Entrar">
        </form>

        <h3>Se ainda não é cliente abra a sua conta aqui.</h3>
        <a href="./cadastrar.php">ABRIR UMA CONTA</a>        
    </div>

<?php
    require("./footer.php");
?>