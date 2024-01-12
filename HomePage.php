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
        <h1>Bem-vindo à Sua Loja Eletrônica</h1>
    </header>

    <main>
        <section class="welcome-message">
            <p>Explore nossa incrível seleção de produtos eletrônicos. Encontre as últimas novidades e ofertas exclusivas.</p>
        </section>

        <section class="featured-products">
            <h2>Produtos em Destaque</h2>
            <?php
                $produto1 = getProdutoById(2);
                $produto2 = getProdutoById(5);
                echo " <div class='product-card'>
                        <img src='{$produto1['url']}' alt='Produto 1'>
                        <h3>{$produto1['nome']}</h3>
                        <p>{$produto1['descricao_curta']}</p>
                        <button>Ver Detalhes</button>
                    </div>";
                echo " <div class='product-card'>
                    <img src='{$produto2['url']}' alt='Produto 2'>
                    <h3>{$produto2['nome']}</h3>
                    <p>{$produto2['descricao_curta']}</p>
                    <button>Ver Detalhes</button>
                </div>"
            ?>
            <!-- Adicione seus produtos em destaque aqui 
            <div class="product-card">
                <img src="produto1.jpg" alt="Produto 1">
                <h3>Nome do Produto 1</h3>
                <p>Descrição breve do Produto 1.</p>
                <button>Ver Detalhes</button>
            </div>

            <div class="product-card">
                <img src="produto2.jpg" alt="Produto 2">
                <h3>Nome do Produto 2</h3>
                <p>Descrição breve do Produto 2.</p>
                <button>Ver Detalhes</button>
            </div>
            -->
            <!-- Adicione mais produtos conforme necessário -->
        </section>
        <!--
        <footer>
            <p>&copy; 2024 Sua Loja Eletrônica. Todos os direitos reservados.</p>
        </footer>   z   
        -->
    </main>
  
</body>
</html>