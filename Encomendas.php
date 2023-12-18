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
                      <div class='card p-4 mt-3'>
                        <div class='first d-flex justify-content-between align-items-center mb-3'>
                            <div class='info'>
                                <span class='d-block name'>Thank you, Alex</span>
                                <span class='order'>Order - 4554645</span>
                            </div>
                            <img src='https://i.imgur.com/NiAVkEw.png' width='40'/>
                        </div>
                        <div class='detail'>
                            <span class='d-block summery'>Your order has been dispatched. We are delivering your order.</span>
                        </div>
                        <hr>
                        <div class='text'>
                            <span class='d-block new mb-1'>Alex Dorlew</span>
                        </div>
                        <span class='d-block address mb-3'>672 Conaway Street Bryantiville Massachusetts 02327</span>
                        <div class='money d-flex flex-row mt-2 align-items-center'>
                            <img src='https://i.imgur.com/ppwgjMU.png' width='20'/>
                            <span class='ml-2'>Cash on Delivery</span>
                        </div>
                        <div class='last d-flex align-items-center mt-3'>
                            <span class='address-line'>CHANGE MY DELIVERY ADDRESS</span>
                        </div>
                    </div>
                    
                    <div class='card p-4 mt-3'>
                        <div class='first d-flex justify-content-between align-items-center mb-3'>
                            <div class='info'>
                                <span class='d-block name'>Thank you, Alex</span>
                                <span class='order'>Order - 4554645</span>
                            </div>
                            <img src='https://i.imgur.com/NiAVkEw.png' width='40'/>
                        </div>
                        <div class='detail'>
                            <span class='d-block summery'>Your order has been dispatched. We are delivering your order.</span>
                        </div>
                        <hr>
                        <div class='text'>
                            <span class='d-block new mb-1'>Alex Dorlew</span>
                        </div>
                        <span class='d-block address mb-3'>672 Conaway Street Bryantiville Massachusetts 02327</span>
                        <div class='money d-flex flex-row mt-2 align-items-center'>
                            <img src='https://i.imgur.com/ppwgjMU.png' width='20'/>
                            <span class='ml-2'>Cash on Delivery</span>
                        </div>
                        <div class='last d-flex align-items-center mt-3'>
                            <span class='address-line'>CHANGE MY DELIVERY ADDRESS</span>
                        </div>
                    </div>";
                

              ?>
            </div>
      </div>
 </main>
</body>
</html>