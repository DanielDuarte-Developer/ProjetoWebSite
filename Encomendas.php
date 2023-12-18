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
            <div>
              <?php 
                $encomendas = getEncomendas();
                echo "<p>Content<p>"
                

              ?>
              
            </div>
      </div>
 </main>
</body>
</html>