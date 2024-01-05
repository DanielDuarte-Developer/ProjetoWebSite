<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/contaCSS.css">
  <title>Configuração de Usuário</title>
</head>
<body>
  <header>
    <?php include "View/AccountMenu.php"?>
  </header>
  
  <main>
   
      <div class="rounded-square-encomendas">
          <h2>Encomendas</h2>
            <div>
              <?php 
                $encomendas = getEncomendas();

                

              ?>
              <p>Content<p>
            </div>
      </div>
      <div class= "container">
        <div class="rounded-square-metedospagamento">
          <h2>Metedos Pagamento</h2>
          <div>
              <p>Content<p>
            </div>
        </div>
        <div class="rounded-square-endereco">
          <h2>Enderenços</h2>
          <div>
              <p>Content<p>
            </div>
        </div>
      </div>
 </main>
</body>
</html>