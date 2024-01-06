<?php
        $productsMenu = [
            'prod01' => ['name' => 'camisa', 'value' => 100],
            'prod02' => ['name' => 'calça', 'value' => 200],
            'prod03' => ['name' => 'boné', 'value' => 50],
        ];
        $cart = [];
        function addProductToCart($product, $amount) {
            global $cart;
                
            for ($i = 0; $i < $amount; $i++) {
                $cart[] = $product;
            }
        }
            
        function getCartTotal($userCart) {
            return array_reduce($userCart, function ($acc, $next) {
                return $acc + $next['value'];
            }, 0);
        }
            
?>
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
           
            $produtos = getProdutos();

            echo " <div class='container'>";
            foreach($produtos as $produto){
                echo "<div class = 'card'>
                        <img src='{$produto['url']}' alt=' ' style='width:100%'>
                        <div class='card-content'>
                            <h2><a href='Produto.php?id={$produto['Id_Produto']}&linkText=Click%20me'>{$produto['nome']}</a></h2>
                            <p class='price'>{$produto['preco']} €</p>
                            <p class='description'>{$produto['descricao_curta']}</p>
                            <button class='add-to-cart'>Add to Cart</button>
                        </div>
                    </div>
                ";
            }
            
            echo "</div>";

           
        ?>
        <div class= 'cart'>
         <a href='Carrinho.php'><img src='Resources/cart256.png'></a>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>