<?php
	{
		include('../../acesso_portal/check_login.php');
	}
	{
		include('../../../conexao/conexao.php');{

		{
			if(empty($_POST['fun_nome'])){
				header('location:../Lista/lista.php?fun_cod=null');
			} else {

				$fun_nome = $_POST['fun_nome'];
				$fun_dataNas = $_POST['fun_dataNas'];
				$fun_sexo = $_POST['fun_sexo'];
				$fun_rg = $_POST['fun_rg'];
				$fun_cpf = $_POST['fun_cpf'];
				$fun_telefone = $_POST['fun_telefone'];
				$fun_celular = $_POST['fun_celular'];
				$fun_email = $_POST['fun_email'];
				$fun_logradouro = $_POST['fun_logradouro'];
				$fun_numero = $_POST['fun_numero'];
				$fun_bairro = $_POST['fun_bairro'];
				$fun_cep = $_POST['fun_cep'];
				$fun_cidade = $_POST['fun_cidade'];
				$fun_estado = $_POST['fun_estado'];
				$fun_funcao = $_POST['fun_funcao'];
				$fun_cargaHoraria = $_POST['fun_cargaHoraria'];
				$fun_login = $_POST['fun_login'];
				$fun_senha = $_POST['fun_senha'];

				$sql = "CALL cadastra_funcionario (:fun_nome,
																					 :fun_dataNas,
																					 :fun_sexo,
																					 :fun_rg,
																					 :fun_cpf,
																					 :fun_telefone,
																					 :fun_celular,
																					 :fun_email,
																					 :fun_logradouro,
																					 :fun_numero,
																					 :fun_bairro,
																					 :fun_cep,
																					 :fun_cidade,
																					 :fun_estado,
																					 :fun_funcao,
																					 :fun_cargaHoraria,
																					 :fun_login,
																					 :fun_senha)";

					$inserir = $conn->prepare($sql);

					$inserir->bindParam( ':fun_nome', $fun_nome);
					$inserir->bindParam( ':fun_dataNas', $fun_dataNas);
					$inserir->bindParam( ':fun_sexo', $fun_sexo);
					$inserir->bindParam( ':fun_rg', $fun_rg);
					$inserir->bindParam( ':fun_cpf', $fun_cpf);
					$inserir->bindParam( ':fun_telefone', $fun_telefone);
					$inserir->bindParam( ':fun_celular', $fun_celular);
					$inserir->bindParam( ':fun_email', $fun_email);
					$inserir->bindParam( ':fun_logradouro', $fun_logradouro);
					$inserir->bindParam( ':fun_numero', $fun_numero);
					$inserir->bindParam( ':fun_bairro', $fun_bairro);
					$inserir->bindParam( ':fun_cep', $fun_cep);
					$inserir->bindParam( ':fun_cidade', $fun_cidade);
					$inserir->bindParam( ':fun_estado', $fun_estado);
					$inserir->bindParam( ':fun_funcao', $fun_funcao);
					$inserir->bindParam( ':fun_cargaHoraria', $fun_cargaHoraria);
					$inserir->bindParam( ':fun_login', $fun_login);
					$inserir->bindParam( ':fun_senha', $fun_senha);

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

						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Funcionario Cadastrado com Sucesso!</strong> \o/
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

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
