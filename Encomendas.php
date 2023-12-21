<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/encomendaCSS.css">
  <title>Configuração de Usuário</title>
</head>
<body>
  <header>
  <?php include "View/AccountMenu.php"?>
  </header>
  
  <main>
    <!-- Single Encomenda -->
      <div class="rounded-square-encomendas">
          <h2>Encomendas</h2>
            <div class = "container">
              <?php 
                //$encomendas = getEncomendas();
                echo "
                      <div class='order-card'>
                        <div class='order-header'>
                            <h2>Detalhes da Encomenda</h2>
                            <p>Número do Pedido: #123456</p>
                        </div>
                        <div class='order-details'>
                            <div class='product-info'>
                                <img src='Resources/img.jpg' alt='Product Image'>
                                <div class='product-text'>
                                    <h3>Nome do Produto</h3>
                                    <p>Quantidade: 2</p>
                                    <p>Preço Unitário: $20.00</p>
                                </div>
                            </div>
                            <div class='total-price'>
                                <p>Total: $40.00</p>
                            </div>
                        </div>
                            <div class='shipping-info'>
                                <h3>Informações de Envio</h3>
                                <p>Endereço de Envio: Rua ABC, Cidade XYZ</p>
                                <p>Status de Entrega: Em Trânsito</p>
                            </div>
                    </div>
                    
                    <div class='order-card'>
                        <div class='order-header'>
                            <h2>Detalhes da Encomenda</h2>
                            <p>Número do Pedido: #123456</p>
                        </div>
                        <div class='order-details'>
                            <div class='product-info'>
                                <img src='Resources/img.jpg' alt='Product Image'>
                                <div class='product-text'>
                                    <h3>Nome do Produto</h3>
                                    <p>Quantidade: 2</p>
                                    <p>Preço Unitário: $20.00</p>
                                </div>
                            </div>
                            <div class='total-price'>
                                <p>Total: $40.00</p>
                            </div>
                        </div>
                            <div class='shipping-info'>
                                <h3>Informações de Envio</h3>
                                <p>Endereço de Envio: Rua ABC, Cidade XYZ</p>
                                <p>Status de Entrega: Em Trânsito</p>
                            </div>
                    </div>
                    <div class='order-card'>
                        <div class='order-header'>
                            <h2>Detalhes da Encomenda</h2>
                            <p>Número do Pedido: #123456</p>
                        </div>
                        <div class='order-details'>
                            <div class='product-info'>
                                <img src='Resources/img.jpg' alt='Product Image'>
                                <div class='product-text'>
                                    <h3>Nome do Produto</h3>
                                    <p>Quantidade: 2</p>
                                    <p>Preço Unitário: $20.00</p>
                                </div>
                            </div>
                            <div class='total-price'>
                                <p>Total: $40.00</p>
                            </div>
                        </div>
                            <div class='shipping-info'>
                                <h3>Informações de Envio</h3>
                                <p>Endereço de Envio: Rua ABC, Cidade XYZ</p>
                                <p>Status de Entrega: Em Trânsito</p>
                            </div>
                    </div>";
              ?>
              
                
      </div>
 </main>
</body>
</html>