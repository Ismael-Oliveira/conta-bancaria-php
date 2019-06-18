<?php
    require("./session.php");
    require("./cabecario.php");
    require("./config.php");

    $operacao = 0;
    $con = $pdo;
    // echo "teste ".$_SESSION['banco'];
    
    if(isset($_POST['transacao']) && !empty($_POST['transacao'])){
        $operacao =  $_POST['transacao'];
        $valor = $_POST['valor'];
        $id = $_SESSION['banco'];
        // echo $valor;
        // echo $id;
        // exit;
        if($operacao == 1){
            operar($operacao, $id, $valor, $con);
            header("Location: ../../index.php");
            exit;
 
        }else if($operacao == 2){
            
            if(($_SESSION['saldo'] - $valor) >= 0){
                operar($operacao, $id, $valor, $con);
                header("Location: ../../index.php");
                exit;
            }
            else {
                echo "Saldo insuficiente para realizar esta operação.";
            }
        }

    }

    function operar($op, $id, $valor, $con){

        $valor = str_replace(",",".", $valor);
        $valor = floatval($valor);

        $novo_saldo = ($op == 1)? $_SESSION['saldo'] + $valor : $_SESSION['saldo'] - $valor ;

        $_SESSION['saldo'] = $novo_saldo;

        $sql = $con->prepare("UPDATE conta SET saldo = '$novo_saldo' WHERE id = '$id'");
        $sql->execute();

        $sql = $con->prepare("INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES(?, ?, ?, NOW())");
        $sql->bindParam(1,$id);
        $sql->bindParam(2,$op);
        $sql->bindParam(3,$valor); 
        
        $sql->execute();
    }
?>
    <div class="op-info">
        <h2>Area de operações</h2>
        <div class="operacao">
            <form method="post">
                <label>Tipo de operação:</label><br>
                <select name="transacao">
                    <option value=""></option>
                    <option value="1" <?php echo ($operacao == 1)? 'selected':''?>>Depósito</option>
                    <option value="2" <?php echo ($operacao == 2)? 'selected':''?>>Saque</option>
                </select>
                <br><br>
                <label for="valor">Valor:</label><br>
                <input type="number" name="valor" placeholder="R$ 0,00">
                <br><br>
                <input type="submit" value="Operar">
            </form>

        </div>
    </div>
    <div class="clear"></div>
<?php
    require("./footer.php");
?>