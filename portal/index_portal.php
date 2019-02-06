<?php
		include('acesso_portal/check_login.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
    <title> Portal Administrador </title>

		<link rel="shortcut icon" href="//virtual.ifro.edu.br/jiparana/pluginfile.php/1/theme_essential/favicon/1535988245/favicon.ico">
		<!-- CSS -->
		<?php include('../inc/css.php'); ?>
		<!-- END-CSS -->
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

	</head>

  <body class="body1">

    <!-- MENU -->
    <?php include('../inc/menu.php'); ?>
    <!-- END-MENU -->
    <div id="wrapper">
      <!-- LATERAL -->
      <div id="sidebar-wrapper">
        <?php include('../inc/container-lateral.php'); ?>
      </div>

      <div id="Conteiner-Principal">
        <div id="pagebody">
          <div class='imagem-capa capa-portal'>
            <div class='texto-capa texto-capa-index'>

              <div class="hamburger hamburger--arrowturn" id="menu-toggle">
                <div class="hamburger-box">
                  <div class="hamburger-inner"></div>
                </div>
              </div>

              <h1 class="hello">Portal do Administrador</h1>
              <div class="sumir">
                <h2 class="index hello">Sistema escolar online</h2>
                <h3 class="index hello">...</h3>
              </div> <!-- sumir -->
            </div> <!-- imagem-capa -->
          </div> <!-- texto-capa -->

          <div id="Conteiner-Conteudo">
            <section id="sobre">
              <div class="container">
                <h1 class="linha_baixo">Sobre o Portal</h1>
                <br/>

                <div class="">
                  <p>Esta parte do sistema é de aceso exclusivo à professores e coordenadores autorizados</p>
                  <div class="" style="display: block;">
                    <h3> Você tem acesso a todas as funções  do Sistema por meio do menu lateral</h3>
                    <p>Organizamos os dados em grupos para facilitar a sua navegação.</p>
                    <p><strong>Para usar, escolha uma tarefa que queria executar.</strong>
                    </p>
                  </div>
                </div>

              </br>
              <h3> Com o acesso total ao Sistema, você pode </h3>
              <span>cadastrar funcionários e alunos</span><br />
              <span>Editar seus dados</span><br />
              <span>e até mesmo excluí-los</span><br />
              <br />

            </div> <!-- container ir -->
          </section> <!-- sobre -->
        </div> <!-- sub -->
      </div> <!--fim da pagebody -->

    </div> <!-- Conteiner-Principal -->

    <!--FOOTER -->
    <?php include('../inc/footer.php'); ?>
    <!-- END FOOTER-->
  </div> <!-- wrapper -->
  <!-- JS -->
  <?php include('../inc/js.php'); ?>
  <!-- END JS -->

</body>
</html>
