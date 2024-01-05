<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="css/loginCSS.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post">
					<input type="hidden" name="action" value="signup">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="Name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="post">
					<input type="hidden" name="action" value="login">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Login</button>
				</form>	
			</div>
	</div>
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include 'model/acessoBaseDados.php';
		$action = $_POST["action"];
        $emailInserted = $_POST['email'];
        $passwordInserted = $_POST['pswd'];
       
        if($action == "login"){
            $user = verifyUser($emailInserted ,$passwordInserted);
        }else{
			
			$nomeCompleto = $_POST['name'];
			
			if(str_contains($nomeCompleto, ' ')){
				// Divide a string em um array usando o espaço como delimitador
				$partes = explode(" ", $nomeCompleto);
    
				// Atribui os valores do array às variáveis
				$nome = $partes[0];
				$apelido = $partes[1];
	
				registerNewUser($emailInserted , $nome, $apelido , $passwordInserted);
	
			}else{
				echo "Introduza Nome e apelido espaçados";
			}
    	}
    }
?>