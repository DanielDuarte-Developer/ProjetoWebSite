<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrinhoCSS.css">
    <title>Carrinho</title>
    <?php
      include "model/acessoBaseDados.php";
      include "model/carrinho.php"
    ?>
</head>
<body>
<div class="card">
            <div class="row-all">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row-text">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted"><?php echo contarProdutosNoCarrinho() ?></div>
                        </div>
                    </div>    
                    <?php

                    foreach($_SESSION["carrinho"] as $produtoId => $product){
                        echo"<div class='row border-top border-bottom'>
                        <div class='row main align-items-center'>
                            <div class='col-2'><img class='img-fluid' src='{$product['url']}'></div>
                            <div class='col'>
                                <div class='row text-muted'>{$product['nome']}</div>
                            </div>
                            <div class='col'>
                                <form method='post' class='form-NumericUpDown'>
                                    <input type='number' value= '{$product['quantidade']}' min='1' >
                                </form>
                            </div>
                            <form method='post'>
                                <input type='hidden' name='produtoId' value='$produtoId'>
                                <div class='col-close-preco'>{$product['preco']} &euro;<button class='close' name='removeProduct'>&#10005;</button></div>
                            </form>
                        </div>
                    </div>";
                    }

                    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['removeProduct'])){
                        $id = $_POST['produtoId'];
                        removerDoCarrinho($id);
                        header("Location: {$_SERVER['REQUEST_URI']}");
                        exit();
                    }
                    ?>

                   
                    <!--
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                            <div class="col">
                                <div class="row text-muted">Shirt</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                                <form method="post" class="form-NumericUpDown">
                                    <input type="number" value= "1" min="1" >
                                </form>
                            </div>
                            <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/ba3tvGm.jpg"></div>
                            <div class="col">
                                <div class="row text-muted">Shirt</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                                <form method="post" class="form-NumericUpDown">
                                   <input type="number" value= "1" min="1" >
                                </form>
                            </div>
                            <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>
                            <div class="col">
                                <div class="row text-muted">Shirt</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                                <form method="post" class="form-NumericUpDown">
                                    <input type="number" value= "1" min="1" >
                                </form>
                            </div>
                            <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    -->
                    <div class="back-to-shop"><a href="Produtos.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
               
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS 3</div>
                        <div class="col text-right"><?php echo calcularTotal() ?> &euro;</div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                        <select name="tipo_entrega">
                            <option class="text-muted">Standard-Delivery- 5.00 &euro;</option>
                            <option class="text-muted">Fast-Delivery -15.00 &euro;</option>
                        </select>
                        <p>GIVE CODE</p>
                        <input id="code" name="codigo" placeholder="Enter your code">
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right"><?php echo calcularTotal() + 5 ?> &euro;</div>
                    </div>

                    <button class="btn">CHECKOUT</button>
                </div>
            </div>
            
        </div>
</body>
</html>