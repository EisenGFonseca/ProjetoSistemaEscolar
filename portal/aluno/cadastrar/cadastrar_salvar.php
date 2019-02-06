<?php
	{
		include('../../acesso_portal/check_login.php');
	}
	{
		include('../../../conexao/conexao.php');{

		{
			if(empty($_POST['alu_nome'])){
				header('location:../Lista/lista.php?alu_cod=null');
			} else {
				$alu_nome = $_POST['alu_nome'];
				$alu_dataNas = $_POST['alu_dataNas'];
				$alu_sexo = $_POST['alu_sexo'];
				$alu_necessidade = $_POST['alu_necessidade'];
				$alu_tp_necessidade = $_POST['alu_tp_necessidade'];
				$alu_rg = $_POST['alu_rg'];
				$alu_cpf = $_POST['alu_cpf'];
				$alu_telefone = $_POST['alu_telefone'];
				$alu_celular = $_POST['alu_celular'];
				$alu_email = $_POST['alu_email'];
				$alu_logradouro = $_POST['alu_logradouro'];
				$alu_numero = $_POST['alu_numero'];
				$alu_bairro = $_POST['alu_bairro'];
				$alu_cep = $_POST['alu_cep'];
				$alu_cidade = $_POST['alu_cidade'];
				$alu_estado = $_POST['alu_estado'];

				$alu_filiacao1 = $_POST['alu_filiacao1'];
				$alu_parentesco1 = $_POST['alu_parentesco1'];
				$alu_telefoneResp1 = $_POST['alu_telefoneResp1'];
				$alu_celularResp1 = $_POST['alu_celularResp1'];
				$alu_emailResp1 = $_POST['alu_emailResp1'];

				$alu_filiacao2 = $_POST['alu_filiacao2'];
				$alu_parentesco2 = $_POST['alu_parentesco2'];
				$alu_telefoneResp2 = $_POST['alu_telefoneResp2'];
				$alu_celularResp2 = $_POST['alu_celularResp2'];
				$alu_emailResp2 = $_POST['alu_emailResp2'];


				$sql = "CALL cadastra_aluno (NULL,
																		 NULL,
																		 :alu_nome,
																		 :alu_dataNas,
																		 :alu_sexo,
																		 :alu_necessidade,
																		 :alu_tp_necessidade,
																		 :alu_rg,
																		 :alu_cpf,
																		 :alu_telefone,
																		 :alu_celular,
																		 :alu_email,
																		 :alu_logradouro,
																		 :alu_numero,
																		 :alu_bairro,
																		 :alu_cep,
																		 :alu_cidade,
																		 :alu_estado,
																		 :alu_filiacao1,
																		 :alu_parentesco1,
																		 :alu_telefoneResp1,
																		 :alu_celularResp1,
																		 :alu_emailResp1,
																		 :alu_filiacao2,
																		 :alu_parentesco2,
																		 :alu_telefoneResp2,
																		 :alu_celularResp2,
																		 :alu_emailResp2,
																	 	 NULL);";

					$inserir = $conn->prepare($sql);

					$inserir->bindParam(':alu_nome', $alu_nome);
					$inserir->bindParam(':alu_dataNas', $alu_dataNas);
					$inserir->bindParam(':alu_sexo', $alu_sexo);
					$inserir->bindParam(':alu_necessidade', $alu_necessidade);
					$inserir->bindParam(':alu_tp_necessidade', $alu_tp_necessidade);
					$inserir->bindParam(':alu_rg', $alu_rg);
					$inserir->bindParam(':alu_cpf', $alu_cpf);
					$inserir->bindParam(':alu_telefone', $alu_telefone);
					$inserir->bindParam(':alu_celular', $alu_celular);
					$inserir->bindParam(':alu_email', $alu_email);
					$inserir->bindParam(':alu_logradouro', $alu_logradouro);
					$inserir->bindParam(':alu_numero', $alu_numero);
					$inserir->bindParam(':alu_bairro', $alu_bairro);
					$inserir->bindParam(':alu_cep', $alu_cep);
					$inserir->bindParam(':alu_cidade', $alu_cidade);
					$inserir->bindParam(':alu_estado', $alu_estado);
					$inserir->bindParam(':alu_filiacao1', $alu_filiacao1);
					$inserir->bindParam(':alu_parentesco1', $alu_parentesco1);
					$inserir->bindParam(':alu_telefoneResp1', $alu_telefoneResp1);
					$inserir->bindParam(':alu_celularResp1', $alu_celularResp1);
					$inserir->bindParam(':alu_emailResp1', $alu_emailResp1);
					$inserir->bindParam(':alu_filiacao2', $alu_filiacao2);
					$inserir->bindParam(':alu_parentesco2', $alu_parentesco2);
					$inserir->bindParam(':alu_telefoneResp2', $alu_telefoneResp2);
					$inserir->bindParam(':alu_celularResp2', $alu_celularResp2);
					$inserir->bindParam(':alu_emailResp2', $alu_emailResp2);

					}
					$inserir->execute();

				}
			}
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Alunos cadastrados </title>

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
							<strong>Aluno Cadastrado com Sucesso!</strong> \o/
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
