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
				$alu_nome = filter_var($_POST['alu_nome']);
				$alu_dataNas = filter_var($_POST['alu_dataNas']);
				$alu_sexo = filter_var($_POST['alu_sexo']);
				$alu_necessidade = filter_var($_POST['alu_necessidade']);
				$alu_tp_necessidade = filter_var($_POST['alu_tp_necessidade']);
				$alu_rg = filter_var($_POST['alu_rg']);
				$alu_cpf = filter_var($_POST['alu_cpf']);
				$alu_telefone = filter_var($_POST['alu_telefone']);
				$alu_celular = filter_var($_POST['alu_celular']);
				$alu_email = filter_var($_POST['alu_email']);
				$alu_logradouro = filter_var($_POST['alu_logradouro']);
				$alu_numero = filter_var($_POST['alu_numero']);
				$alu_bairro = filter_var($_POST['alu_bairro']);
				$alu_cep = filter_var($_POST['alu_cep']);
				$alu_cidade = filter_var($_POST['alu_cidade']);
				$alu_estado = filter_var($_POST['alu_estado']);

				$alu_filiacao1 = filter_var($_POST['alu_filiacao1']);
				$alu_parentesco1 = filter_var($_POST['alu_parentesco1']);
				$alu_telefoneResp1 = filter_var($_POST['alu_telefoneResp1']);
				$alu_celularResp1 = filter_var($_POST['alu_celularResp1']);
				$alu_emailResp1 = filter_var($_POST['alu_emailResp1']);

				$alu_filiacao2 = filter_var($_POST['alu_filiacao2']);
				$alu_parentesco2 = filter_var($_POST['alu_parentesco2']);
				$alu_telefoneResp2 = filter_var($_POST['alu_telefoneResp2']);
				$alu_celularResp2 = filter_var($_POST['alu_celularResp2']);
				$alu_emailResp2 = filter_var($_POST['alu_emailResp2']);

				$sql = "CALL atualiza_alu('$alu_cod',
																	'$alu_nome',
																	'$alu_dataNas',
																	'$alu_sexo',
																	'$alu_necessidade',
																	'$alu_tp_necessidade',
																	'$alu_rg',
																	'$alu_cpf',
																	'$alu_telefone',
																	'$alu_celular',
																	'$alu_email',
																	'$alu_logradouro',
																	'$alu_numero',
																	'$alu_bairro',
																	'$alu_cep',
																	'$alu_cidade',
																	'$alu_estado',
																	'$alu_filiacao1',
																	'$alu_parentesco1',
																	'$alu_telefoneResp1',
																	'$alu_celularResp1',
																	'$alu_emailResp1',
																	'$alu_filiacao2',
																	'$alu_parentesco2',
																	'$alu_telefoneResp2',
																	'$alu_celularResp2',
																	'$alu_emailResp2')";

				$update = $conn->prepare($sql);

				$update->execute();

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
							<strong>Aluno Atualizado com Sucesso!</strong> \o/
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<!-- TABELA FUN -->
						<?php include('../../../inc/tabela-alu-cad.php'); ?>
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
