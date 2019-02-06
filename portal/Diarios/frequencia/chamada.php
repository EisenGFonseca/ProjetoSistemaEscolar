<?php
	{
		include('../../acesso_portal/check_login.php');
	}
  {
    include('../../../conexao/conexao.php');

    $sql = "CALL select_fun";
    $consulta = $conn->prepare($sql);
    $consulta->execute();

    $registros = $consulta->fetchAll(PDO::FETCH_OBJ);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Chamada </title>

    <link rel="shortcut icon" href="//virtual.ifro.edu.br/jiparana/pluginfile.php/1/theme_essential/favicon/1535988245/favicon.ico">
    <!-- CSS -->
    <?php include('../../../inc/css.php'); ?>
    <!-- END-CSS -->
  </head>

	<body class="body1">

		<!-- MENU -->
		<?php include('../../../inc/menu.php'); ?>
		<!-- END-MENU -->

		<!-- CORPO -->
		<div id="Conteiner-Principal">
			<div class='imagem-capa capa-lista'>
				<div class='texto-capa texto-sobre'>
					<h1 class="hello">Chamada</h1>
					<h2 class="index hello sumir">Lista de Frequencia</h2>
					<h3 class="index hello sumir">...</h3>
				</div> <!-- imagem-capa -->
			</div> <!-- texto-capa -->

			<div id="wrapper">
				<div id="pagebody">
					<div id="content">

            <div id="container-contatos">
              <div class="table-responsive-xl">
                <table class="table" data-sortable>
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Número</th>
                      <th scope="col">Aluno</th>
                      <th scope="col">Presença</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($registros as $registro) { ?>
                      <tr>
                        <th scope="row"><?php echo $registro->fun_cod; ?></th>
                        <td><?php echo $registro->fun_nome; ?></td>
                        <td>
                          <a class="none" href="/portal/funcionario/fulano.php?fun_cod=<?php echo $registro->fun_cod; ?>"><button type="button" class="btn btn-info btn-lg btn-block"> Ver Mais </button></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

					</div><!-- Fim da div content -->
				</div> <!--fim da pagebody -->

				<div id="lateral" class="sumir">
					<!-- LATERAL -->
					<?php include('../../../inc/container-lateral.php'); ?>
					<!-- END LATERAL -->
				</div><!-- lateral -->

			</div><!-- Conteiner-Conteudo -->
		</div> <!-- Conteiner-Principal -->

		<!--FOOTER -->
		<?php include('../../../inc/footer.php'); ?>
		<!-- END FOOTER-->

		<!-- JS -->
		<?php include('../../../inc/js.php'); ?>
		<!-- END JS -->

	</body>
	</html>
