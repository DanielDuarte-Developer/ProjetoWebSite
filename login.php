<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="post">
                <label>Username</label>
				<input type="text" name="username" required> <br> <br>
			
				<label>Password</label>
				<input type="password" name="password" required><br><br>
				
				<input type="submit" value="Login" class="btn">
    </form>
    <h2>Caso nao tenha conta registe-se já abaixo</h2>
    <h3><a href="register.php">Register</a></h3>
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include 'model/acessoBaseDados.php';
        $usernameInserted = $_POST['username'];
        $passwordInserted = $_POST['password'];

        $user = verifyUser($usernameInserted,$passwordInserted);

    }
?>