<?php
    unset($_SESSION['email']);
    unset($_SESSION['carrinho']);
    session_destroy();
    header('Location: login.php');
    exit();
?>