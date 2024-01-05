<?php


// Função para adicionar um produto ao carrinho
function addProductToCart($product) {
    if (!isset($_SESSION['shopping_cart'])) {
        $_SESSION['shopping_cart'] = [];
    }

    // Adiciona o produto ao carrinho
    $_SESSION['shopping_cart'][] = $product;
}

// Função para calcular o total do carrinho
function getCartTotal() {
    $total = 0;

    if (isset($_SESSION['shopping_cart'])) {
        foreach ($_SESSION['shopping_cart'] as $product) {
            $total += $product['preco'];
        }
    }

    return $total;
}

// Substitua as credenciais do banco de dados conforme necessário
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lojaonlineweb";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta para obter produtos da base de dados
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

// Inicializar array para armazenar os produtos
$produtos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produtosCSS.css">
    <title>Produtos</title>
</head>
<body>
    <header>
        <?php
            include "View/Menu.php";
        ?>
    </header>

    <main>
        <div class="container">
            <?php
            foreach ($produtos as $produto) {
                echo "<div class='card'>
                        <img src='{$produto['url']}' alt=' ' style='width:100%'>
                        <div class='card-content'>
                            <h2><a href='Produto.php?id={$produto['Id_Produto']}&linkText=Click%20me'>{$produto['nome']}</a></h2>
                            <p class='price'>{$produto['preco']} €</p>
                            <p class='description'>{$produto['descricao_curta']}</p>
                            <form method='post' action='carrinho.php'>
                                <input type='hidden' name='code' value='{$produto['Id_Produto']}'>
                                <input type='hidden' name='name' value='{$produto['nome']}'>
                                <input type='hidden' name='price' value='{$produto['preco']}'>
                                <button type='submit' class='add-to-cart'>Add to Cart</button>
                            </form>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>
