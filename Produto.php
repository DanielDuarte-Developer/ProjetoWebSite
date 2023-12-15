<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ProductCSS.css">
    <title></title>
</head>
<body>
    <main>
        <?php
        include "model/acessoBaseDados.php";
            if(isset($_GET['id'])  && is_numeric($_GET['id'])){
                $produto = getProdutoById($_GET['id']);
                if($produto){
                    echo "<div class='container'>
                    <div class='grid second-nav'>
                    <div class='column-xs-12'>
                        <nav>
                        <ol class='breadcrumb-list'>
                            <li class='breadcrumb-item'><a href='#'>Home</a></li>
                            <li class='breadcrumb-item'><a href='#'>Products</a></li>
                            <li class='breadcrumb-item active'>{$produto['nome']}</li>
                        </ol>
                        </nav>
                    </div>
                    </div>
                    <div class='grid product'>
                    <div class='column-xs-12 column-md-7'>
                        <div class='product-gallery'>
                        <div class='product-image'>
                            <img class='active' src='{$produto['url']}'>
                        </div>  
                        </div>
                    </div>
                    <div class='column-xs-12 column-md-5'>
                        <h1>{$produto['nome']}</h1>
                        <h2>{$produto['preco']} €</h2>
                        <div class='description'>
                        <p>{$produto['descricao_detalhada']}</p>
                        </div>
                        <button class='add-to-cart'>Add To Cart</button>
                    </div>
                    </div>";
                }else{
                    echo "Produto nao encontrado";
                }
                
            }else{
                echo "<p>ID do produto inválido.</p>";
            }
        ?>
            <!--
            <div class="grid related-products">
            <div class="column-xs-12">
                <h3>You may also like</h3>
            </div>
            <div class="column-xs-12 column-md-4">
                <img src="https://source.unsplash.com/miziNqvJx5M">
                <h4>Succulent</h4>
                <p class="price">$19.99</p>
            </div>
            <div class="column-xs-12 column-md-4">
                <img src="https://source.unsplash.com/2y6s0qKdGZg">
                <h4>Terranium</h4>
                <p class="price">$19.99</p>
            </div>
            <div class="column-xs-12 column-md-4">
                <img src="https://source.unsplash.com/6Rs76hNbIWE">
                <h4>Cactus</h4>
                <p class="price">$19.99</p>
            </div>
            </div>
        -->
    </main>

</body>
</html>