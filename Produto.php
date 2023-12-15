<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produtoCSS.css">
    <link rel="stylesheet" href="css/reviewCSS.css">
    <title></title>
</head>
<body>
    <main>
        <?php
        include "model/acessoBaseDados.php";
            $user = $_SESSION['username'];
            if(isset($_GET['id'])  && is_numeric($_GET['id'])){
                $produtoId = $_GET['id'];
                $produto = getProdutoById($produtoId);
                $reviews = getReviews();
                if($produto){
                    echo "<div class='container'>
                    <div class='grid second-nav'>
                    <div class='column-xs-12'>
                        <nav>
                        <ol class='breadcrumb-list'>
                            <li class='breadcrumb-item'><a href='#'>Home</a></li>
                            <li class='breadcrumb-item'><a href='Produtos.php'>Products</a></li>
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
                    </div>
                    <div class='reviews'>
                    <form id='doReview' method='post'>";
                         verifyReviewWithoutReview($user, $produtoId);
                           foreach($reviews as $review):
                           
                                    if($review['produto_id'] == $produtoId){
                                        verifyReviewWithReview($user, $produtoId , $review['nome_utilizador'], $review['comentario']);

                                        $reviewsUsers [] = array(  
                                             'username' => $review['nome_utilizador'],
                                             'comentario' => $review['comentario'],
                                             'rating' => $review['rating']
                                            );
                                    }
                            endforeach;

                            echo "<div class='review'>";
                            if(!(empty($reviewsUsers))){
                                foreach ($reviewsUsers as $rev) {
                                    echo "<div class='name'>{$rev['username']}</div>
                                            <div class='content'>{$rev['comentario']}</div>"
                                            . ratingStars($rev['rating']) ."";
                                }
                            }
                            echo "</div>";
                    echo " </div>";

                }else{
                    echo "Produto nao encontrado";
                }

                if(isset($_POST['submitReview']) && isset($_POST['textArea']) && verifyReview($user, $produtoId) == false){  
                    $comentario = $_POST['textArea'];
                    $rating = $_POST['stars'];
                    createReview($user, $comentario, $rating, $produtoId );
                    header("Location: {$_SERVER['REQUEST_URI']}");
                    exit();
                }
                
            }else{
                echo "<p>ID do produto inválido.</p>";
            }

            function verifyReviewWithoutReview($user,$produto_id){
                if(verifyReview($user,$produto_id) == false){
                    echo "<label>Comentario sobre o produto</label> <br>
                        <textarea type='text' name='textArea' ></textarea><br> 

                        <label>Avaliação</label>
                        <input type='number' name='stars' min='1' max='5'/> <br>
                        <button type='submit' name='submitReview'>
                            Fazer Comentário
                        </button>
                        </form>";

                    echo"<h3>Reviews</h3>";
                }
            }
            function verifyReviewWithReview($user, $produto_id, $commentUsername, $comment){
                if(verifyReview($user,$produto_id) == true && $commentUsername == $user){
                    echo "<label>O seu comentário a este produto</label>
                    <textarea type='text' name='textArea' disabled >$comment</textarea> 

                    </form>";
    
                    echo"<h3>Reviews</h3>";
                }
            }
            function ratingStars($rating){
                switch ($rating){
                    case 1:
                        return "<p>Rating: <span class='rating'>&#9733; &#9734; &#9734; &#9734; &#9734;</span></p>";
                    break;
                    case 2:
                        return "<p>Rating: <span class='rating'>&#9733; &#9733; &#9734; &#9734; &#9734;</span></p>";
                    break;
                    case 3:
                        return "<p>Rating: <span class='rating'>&#9733; &#9733; &#9733; &#9734; &#9734;</span></p>";
                    break;
                    case 4:
                        return "<p>Rating: <span class='rating'>&#9733; &#9733; &#9733; &#9733; &#9734;</span></p>";
                    break;
                    case 5:
                        return "<p>Rating: <span class='rating'>&#9733; &#9733; &#9733; &#9733; &#9733;</span></p>";
                    break;
                }      
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