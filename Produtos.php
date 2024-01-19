<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="css/homePage.css">-->
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
      
        <?php
           include "model/carrinho.php";
            $produtos = getProdutos();

            echo " <div class='container'>";
            foreach($produtos as $produto){
                echo "<div class = 'card'>
                        <form method='post'>
                            <img src='{$produto['url']}' alt=' ' style='width:100%' name='urlProduto'>
                            <div class='card-content'>
                                <h2><a href='Produto.php?id={$produto['Id_Produto']}&linkText=Click%20me' name='nameProduto'>{$produto['nome']}</a></h2>
                                <p class='price' name='preco'>{$produto['preco']} €</p>
                                <p class='description' name='descricao'>{$produto['descricao_curta']}</p>
                                <input type='hidden' name='produtoId' value='{$produto['Id_Produto']}'>
                                <button class='add-to-cart' name='AddCart'>Add to Cart</button>
                            </div>
                        </form>
                    </div>
                ";
            }
            
            echo "</div>";
            
           if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['AddCart'])){
                $produtoId = $_POST['produtoId'];

                $produto = getProdutoById($produtoId);
                $quantidade = 1;

                if ($produto) {
                    $nomeProdutoCarrinho = $produto['nome'];
                    $urlProdutoCarrinho = $produto['url'];
                    $precoCarrinho = $produto['preco'];
                    $quantidadeCarrinho = 1;
    
                    // Adicionar ao carrinho
                    adicionarAoCarrinho($produtoId, $nomeProdutoCarrinho, $precoCarrinho, $quantidadeCarrinho, $urlProdutoCarrinho);
                } else {
                    echo "Produto não encontrado para adicionar ao carrinho.";
                }
           }
        ?>
        <div class= 'cart'>
         <a href='Carrinho.php'><img src='Resources/cart256.png'></a>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>