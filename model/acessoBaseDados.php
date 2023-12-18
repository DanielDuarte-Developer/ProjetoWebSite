<?php
 session_start();
    try {
        $liga = new PDO('mysql:host=localhost;dbname=lojaonlineweb', 'root', '');
        $liga->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "<p>Falha na ligação à base de dados: " . $e->getMessage() . "</p>";
        exit();
    }

    try {
        $escolha = $liga->query("USE lojaonlineweb");
    } catch (PDOException $e) {
        echo "<p>Erro ao aceder à base de dados lojaonlineweb: " . $e->getMessage() . "</p>";
        exit();
    }

    function verifyUser($emailInserted, $passwordInserted) 
	{
		global $liga;
		try {
            $stmt = $liga->prepare("SELECT * FROM dadoslogin Where email = :email AND password = :password");

            // Bind dos parâmetros
            $stmt->bindParam(':email', $emailInserted);
            $stmt->bindParam(':password', $passwordInserted);
        
            // Executar a consulta
            $stmt->execute();
            if($stmt->rowCount() == 1){
                $_SESSION['email'] = $emailInserted;
                header("location: HomePage.php");
                exit();
            }else{
                echo "<br>Utilizador ou password incorretas <br>
                    ou Utilizador pode nao existir";
            }
        
		} catch (PDOException $e) {
			echo 'Erro na consulta: ' . $e->getMessage();
		}
	}

    function getNameByEmail($email){
        global $liga;
        $stmt = $liga->prepare("SELECT * FROM dadoslogin Where email = :email");

        // Bind dos parâmetros
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['nome'];
    
    }
    function getApelidoByEmail($email){
        global $liga;
        $stmt = $liga->prepare("SELECT * FROM dadoslogin Where email = :email");

        // Bind dos parâmetros
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['apelido'];
    
    }

    function getDataByEmail($email){
        global $liga;
        $stmt = $liga->prepare("SELECT * FROM utilizadordados Where email = :email");

        // Bind dos parâmetros
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['data_nascimento'];
    
    }

    function registerNewUser($emailInserted , $name , $apelido ,$passwordInserted) 
	{
		global $liga;

		try {
            $stmt = $liga->prepare("INSERT INTO dadoslogin Values (:email, :name , :apelido , :password)");

            // Bind dos parâmetros
            $stmt->bindParam(':email', $emailInserted);
            $stmt->bindParam(':password', $passwordInserted);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':apelido', $apelido);
        
            // Executar a consulta
            $stmt->execute();
        
            echo "Utilizador Criado com sucesso <br>
             Para voltar ao login clique abaixo";
            echo "<a href='login.php'> Login </a>";
		} catch (PDOException $e) {
			echo 'Erro na consulta: ' . $e->getMessage();
		}
	}

    function getProdutos(){
        global $liga;
        try {
			$stmt = $liga->query("Select * from produtos");
			$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $produtos;
		} catch (PDOException $e) {
			echo "<p>Erro ao executar a consulta: " . $e->getMessage() . "</p>";
		}
    }

    function getProdutoById($id){
        global $liga;
        try {
            $stmt = $liga->prepare("SELECT * FROM produtos WHERE Id_Produto=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            return $produto;
        }
        catch(PDOException $e){
            echo "<p>Erro ao executar a consulta: " . $e->getMessage() . "</p>";
        }
    }

    function getReviews(){
        global $liga;
        try {
			$stmt = $liga->query("Select * from reviews");
			$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $reviews;
		} catch (PDOException $e) {
			echo "<p>Erro ao executar a consulta: " . $e->getMessage() . "</p>";
		}
    }

    function createReview($user, $comentario, $rating, $produtoId ){
        global $liga;
        try {
            $stmt = $liga->prepare("INSERT INTO reviews Values (null , :user, :comentario, :rating ,:produto_id)");
    
                // Bind dos parâmetros
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':comentario', $comentario);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':produto_id', $produtoId);
                
            // Executar a consulta
            $stmt->execute();
            
        } catch (PDOException $e) {
             echo 'Erro na consulta: ' . $e->getMessage();
         }
    }


    function verifyReview($username,$produto_id) 
	{
		global $liga;
		try {
            $stmt = $liga->prepare("SELECT * FROM reviews Where nome_utilizador = :username AND produto_id = :produto_id");

            // Bind dos parâmetros
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':produto_id', $produto_id);
        
            // Executar a consulta
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
		} catch (PDOException $e) {
			echo 'Erro na consulta: ' . $e->getMessage();
		}
	}

    function getEncomendas(){
        global $liga;
        try {
			$stmt = $liga->query("Select * from encomendas");
			$encomendas = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $encomendas;
		} catch (PDOException $e) {
			echo "<p>Erro ao executar a consulta: " . $e->getMessage() . "</p>";
		}
    }

    function verifyExistingDataPerson($email){
        global $liga;
		try {
            $stmt = $liga->prepare("SELECT * FROM dadosmoradautilizador Where person_email = :email");

            // Bind dos parâmetros
            $stmt->bindParam(':email', $email);
        
            // Executar a consulta
            $stmt->execute();
            if($stmt->rowCount() == 1){
              return true;
            }else{
                return false;
            }
        
		} catch (PDOException $e) {
			echo 'Erro na consulta: ' . $e->getMessage();
		}
    }

    function getDadosMoradaUtilizador(){
        global $liga;
        try {
			$stmt = $liga->query("Select * from dadosmoradautilizador");
			$moradas = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $moradas;
		} catch (PDOException $e) {
			echo "<p>Erro ao executar a consulta: " . $e->getMessage() . "</p>";
		}
    }

    function removeDadosUtilizador($email){
        global $liga; // Suponho que $liga seja a sua instância PDO

        try {
            // Preparar a consulta para remover o utilizador com base no email
            $stmt = $liga->prepare("DELETE FROM dadosmoradautilizador WHERE person_email = :email");
    
            // Bind do parâmetro
            $stmt->bindParam(':email', $email);
    
            // Executar a consulta
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro na consulta: ' . $e->getMessage();
        }
    }

    function inserirMorada($nome, $apelido, $morada, $codigoPostal, $cidade, $numTelefone, $nif, $personEmail ){
        global $liga;
        try {
            $stmt = $liga->prepare("INSERT INTO dadosmoradautilizador Values (null , :nome, :apelido, :morada ,:codigo_Postal, :cidade, :num_Telefone, :nif, :person_email, null)");
    
                // Bind dos parâmetros
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':apelido', $apelido);
            $stmt->bindParam(':morada', $morada);
            $stmt->bindParam(':codigo_Postal', $codigoPostal);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':num_Telefone', $numTelefone);
            $stmt->bindParam(':nif', $nif);
            $stmt->bindParam(':person_email', $personEmail);
                
            // Executar a consulta
            $stmt->execute();
            
        } catch (PDOException $e) {
             echo 'Erro na consulta: ' . $e->getMessage();
         }
    }

    function alterarNome($novonome, $novoapelido, $email){
        global $liga;
        try {
            $stmt = $liga->prepare("UPDATE dadoslogin SET nome = :nome, apelido = :apelido WHERE email = :email");

            // Bind dos parâmetros
            $stmt->bindParam(':nome', $novonome);
            $stmt->bindParam(':apelido', $novoapelido);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro na atualização dos dados: " . $e->getMessage();
        }
    }
    
    function getPasswordByEmail($email){
        global $liga;
        $stmt = $liga->prepare("SELECT * FROM dadoslogin Where email = :email");

        // Bind dos parâmetros
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['password'];
    
    }

    function alterarPassword($novapassword, $email){
        global $liga;
        // Executar a consulta
        try {
            $stmt = $liga->prepare("UPDATE dadoslogin SET password = :password WHERE email = :email");

            // Bind dos parâmetros
            $stmt->bindParam(':password', $novapassword);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo "Erro na atualização dos dados: " . $e->getMessage();
        }
    }

    function alterarDataNascimento($data_nascimento, $email){
        global $liga;
        try {
            $stmt = $liga->prepare("SELECT * FROM utilizadordados Where data_nascimento = :data_nascimento And email = :email");

            // Bind dos parâmetros
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':email', $email);
        
            // Executar a consulta
            $stmt->execute();

            if($stmt->rowCount() != 1){
                $stmt = $liga->prepare("INSERT INTO utilizadordados Values (null , :email, :data_nascimento)");
    
                // Bind dos parâmetros
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':data_nascimento', $data_nascimento);
                
                
                // Executar a consulta
                $stmt->execute();
            }else{
                return true;
            }
        } catch (PDOException $e) {
            echo "Erro na atualização dos dados: " . $e->getMessage();
        }
    }
?>