<?php

		include('../../acesso_portal/check_login.php');

		include('../../../conexao/conexao.php');


			if(empty($_POST['alu_nome'])){
				header('location:../Lista/lista.php?alu_nome=null');
			} else {

				// $teste = "SELECT alu_nome FROM aluno WHERE alu_nome = :alu_nome";
				// $buscar = $conn->prepare($teste);
				// $buscar->bindParam(':alu_nome', $alu_nome);
				// $resultado = $buscar->execute();
				//
				// if($resultado && $buscar->rowCount() == 0) {

				$alu_nome = $_POST['alu_nome'];
				$tur_nome = $_POST['tur_nome'];
				$mat_triagem = $_POST['mat_triagem'];
				$mat_responsavel = $_POST['mat_responsavel'];
				$mat_celularResp = $_POST['mat_celularResp'];
				$mat_observacao = $_POST['mat_observacao'];

				$sql = "CALL matricular (NULL,
																 NULL,
																 :alu_nome,
																 :tur_nome,
																 :mat_triagem,
																 :mat_responsavel,
																 :mat_celularResp,
																 :mat_observacao)";

					$inserir = $conn->prepare($sql);
					$inserir->bindParam(':alu_nome', $alu_nome);
					$inserir->bindParam(':tur_nome', $tur_nome);
					$inserir->bindParam(':mat_triagem', $mat_triagem);
					$inserir->bindParam(':mat_responsavel', $mat_responsavel);
					$inserir->bindParam(':mat_celularResp', $mat_celularResp);
					$inserir->bindParam(':mat_observacao', $mat_observacao);
					$inserir->execute();
				// }
				// else{
				// 	header("Location: matricula.php?error=5");
				// }
			}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Alunos matriculados </title>

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

							<h1 class="hello">Alunos Cadastrados</h1>
							<h2 class="index hello sumir">Lista de alunos</h2>
							<h3 class="index hello sumir">Clique em ver mais para ter acesso à seus dados</h3>
						</div> <!-- imagem-capa -->
					</div> <!-- texto-capa -->
					<div id="content">

						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Aluno Matriculado com Sucesso!</strong> \o/
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<!-- TABELA ALUNO -->
						<?php include('../../../inc/tabela-alu-cad.php'); ?>
						<!-- END TABELA ALUNO -->

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
