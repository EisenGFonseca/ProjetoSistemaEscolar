<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="shortcut icon" href="//virtual.ifro.edu.br/jiparana/pluginfile.php/1/theme_essential/favicon/1535988245/favicon.ico">
    <!-- CSS -->
    <?php include('../../inc/css.php'); ?>
    <!-- END-CSS -->
  </head>

  <body class="body1 login">

    <!-- MENU -->
    <?php include('../../inc/menu.php'); ?>
    <!-- END-MENU -->

    <!-- CORPO -->
    <div id="Conteiner-Principal">
      <div class="form-area">
        <h2 class="hello">Efetue o login para prosseguir</h2>
        <br />
        <form class="needs-validation" novalidate name="Cadastro" action="confirma_login.php" method="post" onsubmit="return cadastrarPessoa();" >
          <p>Login</p>
          <input type="text" name="fun_login" placeholder="Login" class="form-control" id="validationCustom01" required>
          <p>Senha:</p>
          <input type="password" name="fun_senha"  placeholder="Senha" class="form-control" id="validationCustom01" required>

          <input type="submit" name="" value="Logar">
          <div style="height: 15px;"> </div>
          <a href="">Esqueceu sua senha?</a>
        </form>
      </div>
    </div> <!-- Conteiner-Principal -->

    <!-- JS -->
    <?php include('../../inc/js.php'); ?>
    <!-- END JS -->

  </body>
</html>
