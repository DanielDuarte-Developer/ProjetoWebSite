<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
                 <label>Username</label>
				<input type="text" name="username" required> <br><br>
			
				<label>Password</label>
				<input type="text" name="password" required><br><br>
				
				<input type="submit" value="Register" class="btn">
    </form>
</body>
</html>
<?php
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include 'model/acessoBaseDados.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        registerNewUser($username,$password);
   }
  
?>