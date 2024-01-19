<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checkoutCSS.css">
    <title>CHECKOUT</title>
</head>
<body>
    <?php
      include "model/acessoBaseDados.php";
      include "model/carrinho.php";
      $personEmail = $_SESSION['email'];
      $moradas = getDadosMoradaUtilizador();
      $pagamentos = getDadosPagamento();
      $idMoradaSelecionada = "";
      $pagamentoIdSelecionado = "";
      if (!isset($_SESSION['numEncomenda'])) {
        $_SESSION['numEncomenda'] = rand(1, 100);
      }
    ?>
    <header>
        <h1>Checkout</h1>
    </header>

    <section>
        <h2>Payment Information</h2>
        <form method="post" id='paymentForm'>
            <h3>Morada</h3>
            <select name="moradaOption">
                <option value="">
                <?php
                    foreach($moradas as $morada){
                        echo "<option value='{$morada['id_dados']}'>{$morada['morada']}...</option>";   
                    }
                ?>
            </select>
            <h3>Pagamento</h3>
            <select name="paymentOption">
                <option value="">
                <?php
                    foreach($pagamentos as $pagamento){
                        echo "<option value='{$pagamento['id_dadosPagamento']}'>{$pagamento['cardNumber']}...</option>";   
                    }
                ?>
            </select>
            <button type="submit" name="placeOrder">Place Order</button>
        </form>
        <?php
          if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['placeOrder'])){
            $idMoradaSelecionada = $_POST['moradaOption'];
            $pagamentoIdSelecionado = $_POST['paymentOption'];
            foreach($_SESSION["carrinho"] as $produtoId => $product){
                $numEncomenda = $_SESSION['numEncomenda'];
               
                associarEncomendasEProdutos($numEncomenda, $produtoId, $product['quantidade']);
            }
            $total = calcularTotal();
            fazerEncomenda($numEncomenda, $idMoradaSelecionada, $pagamentoIdSelecionado, $personEmail, $total);
            header("Location: HomePage.php");
          }
        ?>
       
    </section>
</body>
</html>