<?php
	{
		include('../../acesso_portal/check_login.php');
	}
	{
		include('../../../conexao/conexao.php');{

			if(empty($_POST['alu_cod']) || empty($_POST['alu_nome'])){
				header('location:../Lista/lista.php?alu_cod=null');
			} else {

				$alu_cod = filter_var($_POST['alu_cod']);

				$sql = "CALL delete_alu($alu_cod)";

				$delete = $conn->prepare($sql);

				$delete->bindParam(':alu_cod', $alu_cod);

				$delete->execute();
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Deletado </title>

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
			<div class='imagem-capa capa-cadastrar'>
				<div class='texto-capa texto-sobre'>
					<h1 class="hello">Funcionários</h1>
					<h2 class="index hello sumir">Lista de empregados cadastrados</h2>
					<h3 class="index hello sumir">Clique em ver mais para ter acesso à seus dados</h3>
				</div> <!-- imagem-capa -->
			</div> <!-- texto-capa -->

			<div id="wrapper">
				<div id="pagebody">
					<div id="content">

						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Funcionario Deletado com Sucesso!</strong> \o/
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<!-- TABELA FUN -->
						<?php include('../../../inc/tabela-fun.php'); ?>
						<!-- END TABELA FUN -->

					</div><!-- Fim da div content -->
				</div> <!--fim da pagebody -->

				<div id="lateral" class="sumir">
					<!-- LATERAL -->
					<div id="sidebar-wrapper">
						<?php include('../../../inc/container-lateral.php'); ?>
					</div>

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
