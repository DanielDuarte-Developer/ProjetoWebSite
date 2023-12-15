<?php
session_start();
$status = "";

if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (!empty($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            if ($_POST["code"] == $key) {
                unset($_SESSION["cart"][$key]);
                $status = "<div class='box' style='color:red;'>Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["cart"])) {
                unset($_SESSION["cart"]);
            }
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["cart"] as &$value) {
        if ($value['code'] === $_POST["code"]) {
            $value['quantity'] = $_POST["quantity"];
            break; // Para o loop depois de encontrar o produto
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cartCSS.css">
    <title>Carrinho de Compras</title>
</head>
<body>
    <div style="width: 700px; margin: 50 auto;">

        <h2>Carrinho</h2>

        <?php
        if (!empty($_SESSION["cart"])) {
            $cart_count = count($_SESSION["cart"]);
            ?>
            <div class="cart_div">
                <a href="cart.php">
                    <img src="cart-icon.png" /> Carrinho
                    <span><?php echo $cart_count; ?></span>
                </a>
            </div>
            <?php
        }
        ?>

        <div class="cart">
            <?php
            if (isset($_SESSION["cart"])) {
                $total_price = 0;
                ?>
                <ul class="cart-items">
                    <?php
                    foreach ($_SESSION["cart"] as $product) {
                        ?>
                        <li>
                            <img src='<?php echo $product["image"]; ?>' width="50" height="40" />
                            <?php echo $product["name"]; ?><br />
                            <form method='post' action=''>
                                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                <input type='hidden' name='action' value="remove" />
                                <button type='submit' class='remove'>Remover Item</button>
                            </form>
                            <form method='post' action=''>
                                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                <input type='hidden' name='action' value="change" />
                                <select name='quantity' class='quantity' onchange="this.form.submit()">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        echo "<option " . ($product["quantity"] == $i ? "selected" : "") . " value=\"$i\">$i</option>";
                                    }
                                    ?>
                                </select>
                            </form>
                            <?php echo "$" . $product["price"]; ?>
                            <?php echo "$" . $product["price"] * $product["quantity"]; ?>
                        </li>
                        <?php
                        $total_price += ($product["price"] * $product["quantity"]);
                    }
                    ?>
                </ul>
                <p class="cart-total">Total: R$ <span id="total-value"><?php echo number_format($total_price, 2); ?></span></p>
                <?php
            } else {
                echo "<h3>O seu carrinho está vazio!</h3>";
            }
            ?>
        </div>

        <div style="clear:both;"></div>

        <div class="message_box" style="margin:10px 0px;">
            <?php echo $status; ?>
        </div>
    </div>
</body>
</html>
