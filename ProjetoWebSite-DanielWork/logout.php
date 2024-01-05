<?php
    unset($_SESSION['email']);
    session_destroy();
    header('Location: login.php')
?>