<?php
include "model/acessoBaseDados.php";
$email = $_SESSION['email'];

$nome =  getNameByEmail($email);
$apelido = getApelidoByEmail($email);
?>
<link rel="stylesheet" href="css/accountMenuCSS.css">
<nav id="navbar">
     <ul class="navbar-items flexbox-col">
       <li class="navbar-logo flexbox-left">
         <a class="navbar-item-inner flexbox">
           <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 1438.88 1819.54">
             <polygon points="925.79 318.48 830.56 0 183.51 1384.12 510.41 1178.46 925.79 318.48"/>
             <polygon points="1438.88 1663.28 1126.35 948.08 111.98 1586.26 0 1819.54 1020.91 1250.57 1123.78 1471.02 783.64 1663.28 1438.88 1663.28"/>
           </svg>
         </a>
       </li>

       <li class="navbar-item flexbox-left" >
         <a class="navbar-item-inner flexbox-left" href="DadosPessoais.php">
           <div class="navbar-item-inner-icon-wrapper flexbox">
             <ion-icon name="home-outline"></ion-icon>
           </div>
           <span class="link-text">Dados Pessoais</span>
         </a>
       </li>
       <li class="navbar-item flexbox-left" >
         <a class="navbar-item-inner flexbox-left" href="Encomendas.php">
           <div class="navbar-item-inner-icon-wrapper flexbox">
             <ion-icon name="folder-open-outline"></ion-icon>
           </div>
           <span class="link-text">As Minhas Encomendas</span>
         </a>
       </li>
       
       <li class="navbar-item flexbox-left nome-conta" >
        <a class="navbar-item-inner flexbox-left" href="DadosPessoais.php">
          <div class="navbar-item-inner-icon-wrapper flexbox">
            <img src="Resources/Default.png" alt="Nome da Conta" class="account-image">
          </div>
          <span class="link-text"><?php echo $nome ." ". $apelido;?></span>
        </a>
      </li>
       <!--
       <li class="navbar-item flexbox-left" href="">
         <a class="navbar-item-inner flexbox-left">
           <div class="navbar-item-inner-icon-wrapper flexbox">
             <ion-icon name="settings-outline"></ion-icon>
           </div>
           <span class="link-text">Settings</span>
         </a>
       </li>
       -->
     </ul>
   </nav>