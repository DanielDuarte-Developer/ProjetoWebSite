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
          <h2>Encomenda</h2>
            <div class = "container">
              <?php 
                $encomendasProdutos = getEncomendasProdutos();
                foreach($encomendasProdutos as $encomendaProduto){
                    echo "
                    <div class='order-card'>
                      <div class='order-header'>
                          <h2>Detalhes da Encomenda</h2>
                          <p>Número do Pedido: #{$encomendaProduto['IdEncomenda']}</p>
                      </div>
                      <div class='order-details'>
                          <div class='product-info'>
                              <img src='{$encomendaProduto['url']}' alt='Product Image'>
                              <div class='product-text'>
                                  <h3>{$encomendaProduto['nome']}</h3>
                                  <p>Quantidade: {$encomendaProduto['Quantidade']}</p>
                                  <p>Preço Unitário: {$encomendaProduto['preco']}€</p>
                              </div>
                          </div>
                          <div class='total-price'>
                              <p>Total: {$encomendaProduto['Quantidade']}</p>
                          </div>
                      </div>
                          <div class='shipping-info'>
                              <h3>Informações de Envio</h3>
                              <p>Endereço de Envio: {$encomendaProduto['morada']}, {$encomendaProduto['cidade']} {$encomendaProduto['codigo_Postal']}</p>
                              <p>Status de Entrega: Em Trânsito</p>
                          </div>
                  </div>";
       
                  }
              ?>
      </div>
 </main>
</body>
</html>