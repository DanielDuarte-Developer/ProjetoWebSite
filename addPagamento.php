<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addMoradaCSS.css">
    <title>Document</title>
</head>
<body>
    <?php
    include "model/acessoBaseDados.php";

    $email = $_SESSION['email'];
    $nome =  getNameByEmail($email);
    $apelido = getApelidoByEmail($email);
    ?>
        <h2>Formulário de Adição de Morada</h2>

        <form method="post">
             <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $nome ?>" placeholder="Coloque o primeiro nome" required>

            <label for="apelido">Apelido:</label>
            <input type="text" name="apelido" value="<?php echo $apelido ?>" placeholder="Coloque o ultimo nome" required>
            
            <label for="numeroCartao">Card Number:</label>
            <input type="text" name="numeroCartao" placeholder="XXXX-XXXX-XXXX-XXXX" pattern="\d{4}-\d{4}-\d{4}-\d{4}" required>

            <label for="dataValidade">Expiry Date:</label>
            <input type="text" name="dataValidade" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/\d{2}$" maxlength="7" required>

            <label for="cvv">CVV:</label>
            <input type="text" name="cvv" placeholder="XXX" pattern="\d{3}" maxlength="3" required>

            <button type="submit">Adicionar Pagamento</button>
        </form>

        <?php
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $numeroCartao = $_POST['numeroCartao'];
                $dataValidade = $_POST['dataValidade'];
                $cvv = $_POST['cvv'];

                inserirPagamento($numeroCartao, $dataValidade, $cvv, $email);
                
                header("Location: DadosPessoais.php");
                exit();
            }
        ?>
</body>
</html>