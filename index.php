
<?php
    session_start();
    require("./assets/php/config.php");

    if(!isset($_SESSION['banco']) && empty($_SESSION['banco'])){
        header("Location: ./assets/php/login.php");
        exit;
    }


    $id = $_SESSION['banco'];
    // $sql = $pdo->prepare("SELECT DISTINCT tipo, valor, data_operacao FROM historico, conta WHERE '$id' = historico.id_conta");
    // ou
    $sql = $pdo->prepare("SELECT tipo, valor, data_operacao FROM historico
                            LEFT JOIN conta ON historico.id_conta = conta.id
                            WHERE historico.id_conta = '$id'");
    $sql->execute();
    // print_r($sql->fetchAll());exit;
    // if($sql->rowCount() <= 0){
    //     echo "here teste 2";
    //     exit;
    // };


?>

<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Conta Bancária</title>
</head>
<body>
    
    <header>
        BANCO SICOOB - Caixa Eletrônico Online <a class="sair" href="./assets/php/sair.php">Sair da Conta</a>
    </header> 
    
    <div class="main">
        <div class="main-info">
            <h2>Informações da conta</h2>

            <div class="info_account">
                <strong>Titular: </strong><?php
                    $novoTexto= utf8_encode($_SESSION['nome']);
                    echo $novoTexto;
                 ?>
                <br> 
                <strong>Agência:</strong> <?php echo $_SESSION['agencia']?>
                <br>
                <strong>Conta Corrente: </strong><?php echo $_SESSION['conta']?>
                <br>
                <strong>Saldo:</strong> <?php echo $_SESSION['saldo']?>

            </div>
        </div>

        <div class="main-action">
            <h2>Movimentações/Extrato</h2>

            <a href="./assets/php/realizar_op.php">Realizar operação</a>
            
            <table border="1" width="400">
                <tr>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>tipo</th>
                </tr>
                <?php
                    // if($sql->rowCount() > 0):
                        foreach ($sql->fetchAll() as $value):
                ?>
                    <tr align="center">
                        <td><?php echo date('m-d-Y H:i:m',strtotime( $value['data_operacao']))?></td>
                        <td class="<?php echo ($value['tipo'] == '1')? 'green' : 'red' ?>" >
                            <?php echo $value['valor']?>
                        </td>
                        <td class="<?php echo ($value['tipo'] == '1')? 'green' : 'red'?>">
                            <?php echo ($value['tipo'] == '1')? 'Depósito' : 'Saque' ?>
                        </td>
                    </tr>
                <?php
                        endforeach;
                    // endif;
                ?>
            </table>
        </div>
    </div>
    <div class="clear"></div>
    <footer>
        rodape
    </footer>    
</body>
</html>