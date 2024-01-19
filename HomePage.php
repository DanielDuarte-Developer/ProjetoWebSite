<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homePage.css">
    <title>Home</title>
</head>
<body>
    <header>    
        <?php
            include "View/Menu.php";
        ?>
        <h1 class="header-title">Bem-vindo à Sua Loja Eletrônica</h1>
    </header>

    <main>
        <section class="welcome-message">
            <p>Explore a nossa incrível seleção de produtos eletrônicos. Encontre as últimas novidades e ofertas exclusivas.</p>
        </section>

        <section class="featured-products">
            <h2>Produtos em Destaque</h2>
            <?php
                $produto1 = getProdutoById(2);
                $produto2 = getProdutoById(5);
                $produto3 = getProdutoById(6);
                echo "<div class='products-structure'>";
                echo " <div class='product-card'>
                        <img src='{$produto1['url']}' alt='Produto 1'>
                        <div class='product-details'>
                            <h3>{$produto1['nome']}</h3>
                            <p>{$produto1['descricao_curta']}</p>
                            <form action='Produto.php' method='get'>
                                <button type='submit' name='id' value='{$produto1['Id_Produto']}' class='button-detalhes'>Ver Detalhes</button>
                            </form>
                        </div>
                    </div>";

                    echo " <div class='product-card'>
                    <img src='{$produto2['url']}' alt='Produto 1'>
                    <div class='product-details'>
                        <h3>{$produto2['nome']}</h3>
                        <p>{$produto2['descricao_curta']}</p>
                        <form action='Produto.php' method='get'>
                            <button type='submit' name='id' value='{$produto2['Id_Produto']}' class='button-detalhes'>Ver Detalhes</button>
                        </form>
                    </div>
                </div>";

                echo " <div class='product-card'>
                    <img src='{$produto3['url']}' alt='Produto 1'>
                    <div class='product-details'>
                        <h3>{$produto3['nome']}</h3>
                        <p>{$produto3['descricao_curta']}</p>
                        <form action='Produto.php' method='get'>
                            <button type='submit' name='id' value='{$produto3['Id_Produto']}' class='button-detalhes'>Ver Detalhes</button>
                        </form>
                    </div>
                </div>";
                echo "</div>";
                    /*
                echo " <div class='product-card'>
                    <img src='{$produto2['url']}' alt='Produto 2'>
                    <h3>{$produto2['nome']}</h3>
                    <p>{$produto2['descricao_curta']}</p>
                    <form action='Produto.php' method='get'>
                    <button type='submit' name='id' value='{$produto2['Id_Produto']}' class='button-detalhes'>Ver Detalhes</button>
                    </form>
                </div>"
                */
            ?>
        </section>
    </main>
  
</body>
</html>