<?php

		include('../../acesso_portal/check_login.php');


		include('../../../conexao/conexao.php');

		if(empty($alu_nome = $_GET['alu_nome'])){

			$sql = "SELECT * FROM aluno";
			$consulta = $conn->prepare($sql);
			$consulta->bindParam(':alu_nome', $alu_cod);
			$consulta->execute();

		}else{

				$alu_nome = filter_var($_GET['alu_nome']);

				$sql = "SELECT * FROM aluno WHERE alu_nome = :alu_nome";

				$consulta = $conn->prepare($sql);
				$consulta->bindParam(':alu_nome', $alu_nome);
				$consulta->execute();

				$registro = $consulta->fetch(PDO::FETCH_OBJ);

				$query = "SELECT tur_nome FROM turma";
			}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Matricular Aluno </title>

		<link rel="shortcut icon" href="//virtual.ifro.edu.br/jiparana/pluginfile.php/1/theme_essential/favicon/1535988245/favicon.ico">
		<!-- CSS -->
		<?php include('../../../inc/css.php'); ?>
		<!-- END-CSS -->
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

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

							<h1 class="hello">Matricular Aluno</h1>
							<h2 class="index hello sumir">Preencha o formulario abaixo</h2>
							<h3 class="index hello sumir">para matricular aluno</h3>
						</div> <!-- imagem-capa -->
					</div> <!-- texto-capa -->

					<div id="content">

						<section id="cadastrar">
							<div id="Conteiner-Formulario">
								<h3 class="form">Matricular Aluno</h1>

									<form name="Cadastro" class="needs-validation" novalidate action="matricular_aluno.php" method="post" onsubmit="return cadastrar();" >
										<!-- Nome -->
										<div class="form-group">
											<?php if(empty($alu_nome = $_GET['alu_nome'])): ?>
												<input id="alu_nome" name="alu_nome" type="text" class="form-control auto" placeholder="Nome do Aluno" id="validationCustom01" required />
											<?php else :?>
												<input id="alu_nome" name="alu_nome" type="text" class="form-control auto" placeholder="Nome do Aluno" id="validationCustom01" required value="<?php echo $registro->alu_nome; ?>" readonly />
											<?php endif ?>
										</div>

										<div class="row row-form">
											<!-- turma -->
											<div class="cell-md-6 ajusta">
												<select name="tur_nome"class="custom-select" id="inputGroupSelect02">
													<option value="Nao Selecionado" selected>Turma</option>
													<option value="1°B Inf Mat 2018">1°B Inf Mat 2018</option>
													<option value="2°B Inf Mat 2018">2°B Inf Mat 2018</option>
													<option value="3°A Inf Mat 2018">3°A Inf Mat 2018</option>
													<option value="3°B Inf Mat 2018">3°B Inf Mat 2018</option>
													<option value="5°B Inf Mat 2018">5°B Inf Mat 2018</option>
												</select>
											</div>
											<!-- Triagem -->
											<div class="cell-md-6">
												<select name="mat_triagem"class="custom-select" id="inputGroupSelect02">
													<option value="--" selected>Triagem</option>
													<option value="Deferido">Deferido</option>
													<option value="Indeferido">Indeferido</option>
												</select>
											</div>
										</div>

										<div class="row row-form">
											<!-- Responsável -->
											<div class="cell-md-6 ajusta">
												<input name="mat_responsavel"type="text" class="form-control auto" placeholder="Responsável" id="validationCustom01" required>
											</div>
											<!-- celular -->
											<div class="cell-md-6">
												<input id="celular" name="mat_celularResp" type="text" class="form-control" placeholder="Celular" id="validationCustom01" required>
											</div>
										</div>
										<!-- Obs -->
										<div class="form-group">
											<textarea type="text"  class="form-control" name="mat_observacao" placeholder="Observações"></textarea>
										</div>

										<div class="botoes_form">
											<button type="submit" class="btn btn-success btn-lg btn-block" onClick="validarSenha()">Matricular Aluno</button>
											<button type="reset" class="btn btn btn-warning btn-lg btn-block">Limpar Campos</button>
										</div>
									</form>

								</div><!--Conteiner_Formulário-->
							</section> <!-- sobre -->

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
