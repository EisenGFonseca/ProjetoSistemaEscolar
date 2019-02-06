<?php
  session_start();

  include('../../conexao/conexao.php');

  $fun_login = $_POST['fun_login'];
  $fun_senha = $_POST['fun_senha'];

  $query = "SELECT fun_nome,
                   fun_login
                FROM funcionario
                WHERE fun_login = :fun_login AND fun_senha = :fun_senha";

  $consulta = $conn->prepare($query);

  $consulta->bindParam(':fun_login', $fun_login);
  $consulta->bindParam(':fun_senha', $fun_senha);

  $resultado = $consulta->execute();

  if($resultado && $consulta->rowCount() == 1) {
    $usuario = $consulta->fetch(PDO::FETCH_OBJ);

    $_SESSION['user_nome'] = $usuario->fun_nome;
    $_SESSION['user_login'] = $usuario->fun_login;

    header("Location:../index_portal.php");
  } else {
    header("Location: ../../construcao/error.php");
  }
?>
