<?php
	{
		include('../../acesso_portal/check_login.php');
	}
	{
		include('../../../conexao/conexao.php');{


			if(empty($_GET['fun_cod'])){
				header('location:../Lista/lista.php?error=1');
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
		<title> Editar Funcionário </title>

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
							<h1 class="hello">Editar Informações</h1>
							<h2 class="index hello sumir">Atualize as Informações abaixo</h2>
							<h3 class="index hello sumir">Ainda não é possível alterar o cargo do funcionario</h3>
						</div> <!-- imagem-capa -->
					</div> <!-- texto-capa -->
					<div id="content">

						<section id="cadastrar">
							<div id="Conteiner-Formulario">
								<h3 class="form">Atualizar Dados</h1>

									<form name="Cadastro" class="needs-validation" novalidate action="atualizar_salvar.php" method="post" onsubmit="return cadastrar();" >

										<input name="fun_cod" type="hidden" value="<?php echo $registro->fun_cod; ?>">
										<!-- nome -->
										<div class="form-group">
											<input name="fun_nome"type="text" class="form-control" placeholder="Nome Completo" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_nome; ?>"/>
										</div>
										<div class="row row-form">
											<!-- datanas -->
											<div class="cell-md-6 ajusta">
												<input id="calendario" name="fun_dataNas" type="text" placeholder="Data de nascimento"  class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_dataNas; ?>"/>
											</div>
											<!-- sexo -->
											<div class="cell-md-6">
												<select name="fun_sexo"class="custom-select" id="inputGroupSelect02">
													<option selected><?php echo $registro->fun_sexo; ?></option>
													<option value="Masculino">Masculino</option>
													<option value="Feminino">Feminino</option>
												</select>
											</div>
										</div>

										<div class="row row-form">
											<!-- rg -->
											<div class="cell-md-6 ajusta">
												<input name="fun_rg"type="text" class="form-control" placeholder="RG" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_rg; ?>"/>
											</div>
											<!-- cpf -->
											<div class="cell-md-6">
												<input id="cpf" name="fun_cpf"type="text" class="form-control" placeholder="CPF" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_cpf; ?>"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- telefone -->
											<div class="cell-md-6 ajusta">
												<input id="telefone" name="fun_telefone" type="text" class="form-control" placeholder="Telefone" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_telefone; ?>"/>
											</div>
											<!-- celular -->
											<div class="cell-md-6">
												<input id="celular" name="fun_celular" type="text" class="form-control" placeholder="Celular" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_celular; ?>"/>
											</div>
										</div>
										<!-- email -->
										<div class="form-group">
											<input id="email" name="fun_email" type="email" class="form-control" placeholder="Email" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_email; ?>"/>
										</div>
										<div class="row row-form">
											<!-- logr -->
											<div class="cell-md-6 ajusta">
												<input name="fun_logradouro"type="text" class="form-control" placeholder="Logradouro" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_logradouro; ?>"/>
											</div>
											<!-- numero -->
											<div class="cell-md-6">
												<input name="fun_numero"type="text" class="form-control" placeholder="Numero" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_numero; ?>"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- bairro -->
											<div class="cell-md-6 ajusta">
												<input name="fun_bairro"type="text" class="form-control" placeholder="Bairro" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_bairro; ?>"/>
											</div>
											<!-- cep -->
											<div class="cell-md-6">
												<input name="fun_cep"type="text" class="form-control" placeholder="CEP" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_cep; ?>"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- cidade -->
											<div class="cell-md-6 ajusta">
												<input name="fun_cidade"type="text" class="form-control" placeholder="Cidade" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_cidade; ?>"/>
											</div>
											<!-- estado -->
											<div class="cell-md-6">
												<input id="estado" name="fun_estado"type="text" class="form-control" placeholder="Estado" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_estado; ?>"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- funcao -->
											<div class="cell-md-6 ajusta">
												<select name="fun_funcao"class="custom-select" id="funcao" onchange="optionCheck()">
													<option selected><?php echo $registro->fun_funcao; ?></option>
													<option value="Professor">Professor</option>
													<option value="Diretor">Diretor</option>
													<option value="Secretario">Secretário</option>
												</select>
											</div>
											<!-- fun_cargaHoraria -->
											<div class="cell-md-6">
												<select name="fun_cargaHoraria"class="custom-select" id="carga" onchange="optionCheck()">
													<option selected><?php echo $registro->fun_cargaHoraria; ?></option>
													<option value="20h">20h</option>
													<option value="30h">30h</option>
													<option value="40h">40h</option>
													<option value="80h">80h</option>
													<option value="120h">120h</option>
												</select>
											</div>
										</div>

										<div class="row row-form">
											<!-- login -->
											<div class="cell-md-6 ajusta">
												<input name="fun_login" type="text" class="form-control" placeholder="Login" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_login; ?>"/>
											</div>
											<!-- senha -->
											<div class="cell-md-6">
												<input name="fun_senha" type="password" class="form-control" placeholder="Senha" class="form-control" id="validationCustom01" required value="<?php echo $registro->fun_senha; ?>"/>
											</div>
										</div>

										<br  Use readonly="true"/>
										<h5>Deseja realmente atualizar este registro?</h5>

										<div class="botoes_form">
											<a href="/portal/funcionario/Lista/lista.php?calcelado" class="btn btn-success btn-lg btn-block" role="button"> Cancelar </a>
											<button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter"> Atualizar </button>
										</div>

										<!-- Modal -->
										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">Deseja mesmo atualizar este registro?</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														Uma vez atualizado, não será possivel recuperá-lo!
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-success" data-dismiss="modal"> Cancelar </button>
														<button type="submit" class="btn btn-warning"  onclick="funcao_alerta_att()"> Atualizar </button>
													</div>

												</div> <!-- odal-content -->
											</div> <!-- modal-dialog modal-dialog-centered -->
										</div> <!-- modal fade -->
										<!-- Fim Modal -->

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
