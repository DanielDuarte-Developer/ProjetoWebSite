<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/dadoPessoaisCSS.css">
  <title>Configuração de Utilizador</title>
</head>
<body>
  <header>
    <?php 
    include "View/AccountMenu.php";
    global $data_nascimento;
    $email = $_SESSION['email'];
    $nome =  getNameByEmail($email);
    $apelido = getApelidoByEmail($email);


    if($data_nascimento != null ){
      $data_nascimento =  getDataByEmail($email);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      if(isset($_POST['buttonRemove'])){
        removeDadosUtilizador($email);
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit();
      }else if(isset($_POST['buttonAdd'])){
        header("Location: addMorada.php");
        exit();
      }elseif(isset($_POST['buttonGuardarDados'])){
        $nomePost = $_POST['nome'];
        $apelidoPost = $_POST['apelido'];
        $data_nascimento = $_POST['data_nascimento'];
      
        if($nome != $nomePost || $apelido != $apelidoPost){
          alterarNome($nomePost, $apelidoPost, $email);
          
        }
        alterarDataNascimento($data_nascimento, $email);

      }elseif(isset($_POST['buttonNovaPassword'])){
        $passwordAtual = getPasswordByEmail($email);
        $passwordPost = $_POST['passactual'];
        $passwordPostNova = $_POST['novapass'];
        $passwordPostConfi = $_POST['confinovapass'];

        if($passwordAtual == $passwordPost){
          if($passwordPostNova == $passwordPostConfi){
            alterarPassword($passwordPostNova, $email);
          }
        }else{
          echo "<p>Password Errada</p>";
        }
      }
    }
    ?>
  </header>
  
  <main>
      <div class="rounded-square">
          <h2>Dados da Minha Conta</h2>
            <form class="profile-form" method="post">
              <div class="left-side-dadosconta">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="input-text" type="text" id="nome" name="nome" value="<?php echo $nome ?>" required>
                </div>
                <div class="form-group">
                    <label for="apelido">Apelido</label>
                    <input class="input-text" type="text" id="apelido" value="<?php echo $apelido ?>" name="apelido">
                </div>
              </div>
              <div class= "right-side-dadosconta">
              <div class="form-group">
                  <label for="email">E-mail</label>
                  <input class="input-text" type="email" id="email" name="email"value="<?php echo $email ?>" disabled>
              </div> 
              <?php
               if($data_nascimento != null){
                echo "<div class='form-group'>
                        <label for='data_nascimento'>Data de Nascimento</label>
                        <input class='input-text' type='date' id='data_nascimento'  value= '$data_nascimento' name='data_nascimento'>
                    </div>";
               }else{
                echo "<div class='form-group'>
                        <label for='data_nascimento'>Data de Nascimento</label>
                        <input class='input-text' type='date' id='data_nascimento' name='data_nascimento'>
                    </div>";
               }
              ?>
              </div>

              <button class="button-Atualizar" name= "buttonGuardarDados"type="submit">Guardar</button>
          </form>
          <?php
      
          ?>
      </div>
        <div class="rounded-square">
          <h2>Alterar Password</h2>
            <form class="profile-form" method="post">
                <div class="left-side-alterarpassword">
                  <div class="form-group">
                      <label for="passactual">Password actual</label>
                      <input class="input-text" type="password" id="passactual" name="passactual" required>
                  </div>
                </div>
                <div class= "right-side-alterarpassword">
                  <div class="form-group">
                      <label for="novapass">Nova Password</label>
                      <input class="input-text" type="password" id="novapass" name="novapass" required>
                  </div>
                  <div class="form-group">
                      <label for="confinovapass">Confirmar Nova Password</label>
                      <input class="input-text" type="password" id="confinovapass" name="confinovapass" required>
                  </div> 
                 
                </div>
                <button class="button-Atualizar" name="buttonNovaPassword" type="submit">Guardar</button>
            </form>
        </div>
        <div class="rounded-square">
          <h2>Moradas de Entrega e de Faturação</h2>
          <div>
          <form method="post">
            <?php 
              if(verifyExistingDataPerson($email) == true){
                $utilizadoresmorada = getDadosMoradaUtilizador();
                foreach( $utilizadoresmorada as $utilizadoresmorada){
                  if ($utilizadoresmorada['person_email']==$email){
                  echo "<div class='moradasandfaturacao-square'>
                          <div class= 'NomeApelido-div'>
                            <p>".$nome.' '.$apelido."</p>
                          </div>
                          <div class= 'Morada-div'>
                            <p>".$utilizadoresmorada['morada']."</p>
                          </div>
                          <div class= 'CodgioPostalCidade-div'>
                            <p>".$utilizadoresmorada['codigo_Postal'].", ".  $utilizadoresmorada['cidade']."</p>
                          </div>
                          <div class= 'Telefone-div'>
                            <p>T: ".$utilizadoresmorada['num_Telefone']."</p>
                          </div>
                          <div class= 'Nif-div'>
                            <p>Nif: ".$utilizadoresmorada['nif']."</p>
                          </div>
                          <div class='div-button-remove'>
                            <button class='button-remove' type='submit' name='buttonRemove'>Remover morada</button>
                            <button class='button-escolha' type='submit' name='buttonEscolha'>Escolher esta morada</button>
                          </div>
                    </div>
                    <button class='button-add' type='submit' name='buttonAdd'>Adicionar nova morada</button>";
                  } 
                }
              }else{
                echo " <div class='moradasandfaturacao-square'>
                       </div>
                       <button class='button-add' type='submit ' name='buttonAdd'>Adicionar nova morada</button>";
                       
              }

              

            ?>
            </form>
            <?php 
            function logicEscolha(){
              if(isset($_POST['buttonEscolha'])){
                $_SESSION['moradaEscolhida'] = $utilizadoresmorada['id_dados'];
                echo " <button class='button-escolhido' type='button' name='buttonEscolhido'>Morada Escolhida</button>";
              }else{
                 echo "<button class='button-escolha' type='submit' name='buttonEscolha'>Escolher esta morada</button>";
              }
            }
            ?>
          </div>
        </div>

        
 </main>
</body>
</html>