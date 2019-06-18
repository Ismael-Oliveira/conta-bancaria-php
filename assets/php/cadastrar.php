<?php
    require("./cabecario.php");
    require("./config.php");
    
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        
        $nome = $_POST['nome'];
        $agencia = $_POST['agencia'];
        $conta = $_POST['conta'];
        $deposito = $_POST['deposito'];
        $senha = md5($_POST['senha']);

        // $sql = $pdo->prepare("SELECT * FROM conta WHERE agencia = ? AND conta_bank = ? AND senha = ?");
        $sql = $pdo->prepare("INSERT INTO conta(nome, agencia, conta_bank, saldo, senha) VALUES(?, ?, ?, ?, ?)");
        
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $agencia);
        $sql->bindParam(3, $conta);
        $sql->bindParam(4, $deposito);
        $sql->bindParam(5, $senha);
                
        if($sql->execute()){
            header("Location: ./login.php");
            exit;
        }else{
            echo "Erro na abertura da conta.";
        }

    }
?>

<style>
    header a{
        display: none;
    }

    form input{
        width: 250px;
    }

    form input[type=submit]{
        width: 150px;
    }
</style>

<div class="main-form">
    <h2>Preencha os campos abaixo para realizar seu cadastro</h2>
    <form method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome_form" size="100">
        <br><br>
        <label for="agencia">Agência:</label><br>
        <input type="number" name="agencia" id="agencia_form">
        <br><br>
        <label for="conta">Conta:</label><br>
        <input type="number" name="conta" id="conta_form">
        <br><br>
        <label for="deposito">Deposito:</label><br>
        <input type="number" name="deposito" id="dep_form">
        <br><br>
        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" id="senha_form"><br><br>

        <input type="submit" value="Abrir Conta">
    </form>
       
</div>

<?php
    require("./footer.php");
?>