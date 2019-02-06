<?php
	{
		include('../../acesso_portal/check_login.php');
	}

	include('../../../conexao/conexao.php');
	$sql = "CALL select_fun";
	$consulta = $conn->prepare($sql);
	$consulta->execute();

	$registros = $consulta->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Funcionários cadastrados </title>

		<link rel="shortcut icon" href="//virtual.ifro.edu.br/jiparana/pluginfile.php/1/theme_essential/favicon/1535988245/favicon.ico">
		<!-- CSS -->
		<?php include('../../../inc/css.php'); ?>
		<!-- END-CSS -->
	</head>

	<body class="body1">

		<!-- MENU -->
		<?php include('../../../inc/menu.php'); ?>
		<!-- END-MENU -->
		<div id="wrapper">
			<!-- LATERAL -->
			<div id="sidebar-wrapper">
				<?php include('../../../inc/container-lateral.php'); ?>
			</div>

			<div id="Conteiner-Principal">
				<div id="pagebody">
					<div class='imagem-capa capa-lista'>
						<div class='texto-capa texto-sobre'>

							<div class="hamburger hamburger--arrowturn" id="menu-toggle">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>

							<h1 class="hello">Funcionários</h1>
							<h2 class="index hello sumir">Lista de empregados cadastrados</h2>
							<h3 class="index hello sumir">Clique em ver mais para ter acesso à seus dados</h3>
						</div> <!-- imagem-capa -->
					</div> <!-- texto-capa -->
					<div id="content">

						<!-- TABELA FUN -->
						<?php include('../../../inc/tabela-fun.php'); ?>
						<!-- END TABELA FUN -->

					</div><!-- Fim da div content -->
				</div> <!--fim da pagebody -->

			</div> <!-- Conteiner-Principal -->

			<!--FOOTER -->
			<?php include('../../../inc/footer.php'); ?>
			<!-- END FOOTER-->
		</div> <!-- wrapper -->
		<!-- JS -->
		<?php include('../../../inc/js.php'); ?>
		<!-- END JS -->

	</body>
</html>
