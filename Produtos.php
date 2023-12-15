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
    <link rel="stylesheet" href="css/homePage.css">
    <link rel="stylesheet" href="css/ProdutosCSS.css">
    <title>Produtos</title>
</head>
<body>
    <header>
        <?php
            include "View/Menu.html";
        ?>
    </header>

    <main>
        <?php
           
            include "model/acessoBaseDados.php";
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
        
       <!--
        <section class="row">
           
                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>

                <div class="card">
                    <img src="resources/img.jpg" alt="Denim Jeans" style="width:100%">
                    <h1><a href="anotherPage.php?linkText=Click%20me">Tailored Jeans</a></h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the jeans..</p>
                    <p><button>Add to Cart</button></p>
                </div>
        </section>
        -->
    </main>

    <footer>

    </footer>
</body>
</html>