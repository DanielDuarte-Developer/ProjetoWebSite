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
            
            <label for="morada">Morada:</label>
            <input type="text" name="morada" placeholder="Indique o numero da rua numero..." required>

            <label for="codigoPostal">Código-Postal:</label>
            <input type="text" name="codigoPostal"  placeholder="0000-000" pattern="^\d{4}-\d{3}$" maxlength="8" required>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" placeholder="Insira a cidade" required>
            
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" pattern="^\d{9}?$"  maxlength="9" placeholder="Insira um contacto válido" required>
    
            <label for="nif">Nif:</label>
            <input type="text" name="nif"  maxlength="9" placeholder="Insira um nif válido" required>

            <button type="submit">Adicionar Morada</button>
        </form>

        <?php
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $morada = $_POST['morada'];
                $codigoPostal = $_POST['codigoPostal'];
                $cidade = $_POST['cidade'];
                $telefone = $_POST['telefone'];
                $nif = $_POST['nif'];

                inserirMorada($morada, $codigoPostal, $cidade, $telefone, $nif, $email);
                
                header("Location: DadosPessoais.php");
                exit();
            }
        ?>
</body>
</html>