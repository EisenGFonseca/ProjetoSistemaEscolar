<?php
  session_start();

  if(!isset($_SESSION['user_login']) || !$_SESSION['user_login'])
    header('Location: /portal/acesso_portal/login.php');
?>
