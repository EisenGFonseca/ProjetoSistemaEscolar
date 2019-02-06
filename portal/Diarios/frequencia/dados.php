<?php
	{
		include('../../acesso_portal/check_login.php');
	}
	{
		include('../../../conexao/conexao.php');{
			}
		}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Dados para Chamada </title>

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
			<?php include('../../../inc/container-lateral.php'); ?>

			<div id="Conteiner-Principal">
				<div id="pagebody">
					<div class='imagem-capa capa-lista'>
						<div class='texto-capa texto-sobre'>

							<div class="hamburger hamburger--arrowturn" id="menu-toggle">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>

							<h1 class="hello">Dados para Chamada</h1>
							<h2 class="index hello sumir">Lista de Frequencia</h2>
							<h3 class="index hello sumir">Forneça os dados para realizar a chamada</h3>
						</div> <!-- texto-capa texto-sobre -->
					</div> <!-- imagem-capa capa-lista -->
					<div id="content">

						<section id="cadastrar">
							<div id="Conteiner-Formulario">
								<h3 class="form">Dados</h1>

									<form name="Cadastro" class="needs-validation" novalidate action="matricular_salvar.php" method="post" onsubmit="return cadastrar();" >

										<div class="row row-form">
											<!-- disciplina -->
											<div class="cell-md-6 ajusta">
												<input name="cha_disciplina"type="text" class="form-control" placeholder="Disciplina" class="form-control" id="validationCustom01" required>
											</div>
											<!-- turma -->
											<div class="cell-md-6">
												<input name="cha_turma" type="text" placeholder="Turma" class="form-control" id="validationCustom01" required/>
											</div>
										</div>
										<div class="row row-form">
											<!-- horario-inicio -->
											<div class="cell-md-6 ajusta">
												<input name=""type="text" class="form-control" placeholder="Horário Início" class="form-control" id="validationCustom01" required>
											</div>
											<!-- horario-fim -->
											<div class="cell-md-6">
												<input name="" type="text" placeholder="Horário Fim" class="form-control" id="validationCustom01" required/>
											</div>
										</div>

										<div class="botoes_form">
											<button type="submit" class="btn btn-success btn-lg btn-block" onClick="validarSenha()">Cadastrar Aluno</button>
											<button type="reset" class="btn btn btn-warning btn-lg btn-block">Limpar Campos</button>
										</div>
									</form>

								</div><!--Conteiner_Formulário-->
							</section> <!-- sobre -->
						</div><!-- Fim da div content -->
					</div> <!--fim da pagebody -->
				</div><!-- Conteiner-Conteudo -->
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
