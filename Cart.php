<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cartCSS.css">
    <title>Carrinho de Compras</title>
</head>
<body>
    <div class="cart">
        <h2>Carrinho de Compras</h2>
    
        <ul class="cart-items">
            <?php
            $cart = $_SESSION['cart'];
            foreach($cart as $produto){
            
            }
            ?>
        <!-- Os itens do carrinho serão adicionados dinamicamente aqui -->
        </ul>
    
        <p class="cart-total">Total: R$ <span id="total-value">0.00</span></p>
    </div>
</body>
</html>