<?php
	{
		include('../acesso_portal/check_login.php');
	}
	{
		include('../../conexao/conexao.php');{

			$fun_cod = $_GET['fun_cod'];

			if(empty($fun_cod = $_GET['fun_cod'])){
				header('location:../Lista/lista.php');
			}else{

				$fun_cod = filter_var($_GET['fun_cod']);

				$sql = "SELECT * FROM funcionario WHERE fun_cod = :fun_cod";

				$consulta = $conn->prepare($sql);
				$consulta->bindParam(':fun_cod', $fun_cod);
				$consulta->execute();

				$registro = $consulta->fetch(PDO::FETCH_OBJ);
			}
		}
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Sobre <?php echo $registro->fun_nome; ?></title>

    <link rel="shortcut icon" href="//virtual.ifro.edu.br/jiparana/pluginfile.php/1/theme_essential/favicon/1535988245/favicon.ico">
    <!-- CSS -->
    <?php include('../../inc/css.php'); ?>
    <!-- END-CSS -->
  </head>

	<body class="body1">

		<!-- MENU -->
		<?php include('../../inc/menu.php'); ?>
		<!-- END-MENU -->
		<div id="wrapper">
			<!-- LATERAL -->
			<div id="sidebar-wrapper">
				<?php include('../../inc/container-lateral.php'); ?>
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
							<h1 class="hello"><?php echo $registro->fun_nome; ?></h1>
							<h2 class="index hello">Detalhes sobre o funcionario</h2>
							<h3 class="index hello sumir">...</h3>
						</div> <!-- imagem-capa -->
					</div> <!-- texto-capa -->

					<div id="content">
						<div id="fulano">
							<h3 class="esq-preta barra"><b>Infomações Pessoais</b></h3>
							<h4 class="esq-preta barra-sub"><b>Pessoais</b></h4>
							<h6 class="esq-preta"><b>Nome Completo:</b> <?php echo $registro->fun_nome; ?></h6>
							<h6 class="esq-preta"><b>Dt. Nascimento:</b> <?php echo $registro->fun_dataNas; ?></h6>
							<h6 class="esq-preta"><b>Sexo:</b> <?php echo $registro->fun_sexo; ?></h6>
							<h6 class="esq-preta"><b>RG:</b> <?php echo $registro->fun_rg; ?></h6>
							<h6 class="esq-preta"><b>CPF:</b> <?php echo $registro->fun_cpf; ?></h6>
							<br />
							<h4 class="esq-preta barra-sub"><b>Contato</b></h4>
							<h6 class="esq-preta"><b>Telefone:</b> <?php echo $registro->fun_telefone; ?></h6>
							<h6 class="esq-preta"><b>Celular:</b> <?php echo $registro->fun_celular; ?></h6>
							<h6 class="esq-preta"><b>Email:</b> <?php echo $registro->fun_email; ?></h6>
							<br />
							<h4 class="esq-preta barra-sub"><b>Endereço</b></h4>
							<h6 class="esq-preta"><b>Logradouro:</b> <?php echo $registro->fun_logradouro; ?></h6>
							<h6 class="esq-preta"><b>Bairro:</b> <?php echo $registro->fun_bairro; ?></h6>
							<h6 class="esq-preta"><b>CEP:</b> <?php echo $registro->fun_cep; ?></h6>
							<h6 class="esq-preta"><b>Cidade:</b> <?php echo $registro->fun_cidade; ?></h6>
							<h6 class="esq-preta"><b>Estado:</b> <?php echo $registro->fun_estado; ?></h6>
							<br />
							<h4 class="esq-preta barra-sub"><b>Cargo</b></h4>
							<h6 class="esq-preta"><b>Função:</b> <?php echo $registro->fun_funcao; ?></h6>
							<h6 class="esq-preta"><b>Carga Horária:</b> <?php echo $registro->fun_cargaHoraria; ?></h6>
							<br />
							<a href="/portal/funcionario/atualizar/atualizar.php?fun_cod=<?php echo $registro->fun_cod; ?>"class="btn btn-warning btn-lg btn-block" role="button">Editar informações</button></a>
							<a href="/portal/funcionario/deletar/deletar.php?fun_cod=<?php echo $registro->fun_cod; ?>" class="btn btn-danger btn-lg btn-block" role="button">Excluir Funcionário</button></a>
						</div><!-- fulano -->
					</div><!-- Fim da div content -->
				</div> <!--fim da pagebody -->

			</div> <!-- Conteiner-Principal -->

			<!--FOOTER -->
			<?php include('../../inc/footer.php'); ?>
			<!-- END FOOTER-->
		</div> <!-- wrapper -->
		<!-- JS -->
		<?php include('../../inc/js.php'); ?>
		<!-- END JS -->

	</body>
</html>
