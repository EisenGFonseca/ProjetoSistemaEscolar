<?php
	{
		include('../../acesso_portal/check_login.php');
	}
	{
		include('../../../conexao/conexao.php');{


			if(empty($_GET['alu_cod'])){
				header('location:../Lista/lista_erro.php');
			}else{

				$alu_cod = filter_var($_GET['alu_cod']);

				$sql = "SELECT * FROM aluno WHERE alu_cod = :alu_cod";

				$consulta = $conn->prepare($sql);
				$consulta->bindParam(':alu_cod', $alu_cod);
				$consulta->execute();

				$registro = $consulta->fetch(PDO::FETCH_OBJ);
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title> Atualizar Aluno</title>

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

							<h1 class="hello">Atualizar Dados</h1>
							<h2 class="index hello sumir">Edite o formulário abaixo</h2>
							<h3 class="index hello sumir">Edite apenas os campos necessários</h3>
						</div> <!-- imagem-capa -->
					</div> <!-- texto-capa -->

					<div id="content">

						<section id="cadastrar">
							<div id="Conteiner-Formulario">
								<h3 class="form">Atualizar dados do Aluno</h1>

									<form name="Atualizar" class="needs-validation" novalidate action="atualizar_salvar.php" method="post" onsubmit="return cadastrar();" >

										<!-- TABS -->
										<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#aluno" role="tab" aria-controls="home" aria-selected="true">Sobre o Aluno</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#contato" role="tab" aria-controls="profile" aria-selected="false">Contato</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#endereco" role="tab" aria-controls="contact" aria-selected="false">Endereço</a>
											</li>
										</ul>

										<!-- CONTEUDO DAS TABS -->
										<div class="tab-content" id="myTabContent">
											<!-- aluno -->
											<div class="tab-pane fade show active" id="aluno" role="tabpanel" aria-labelledby="home-tab">
												<!-- cod -->
												<input name="alu_cod" type="hidden" value="<?php echo $registro->alu_cod; ?>">
												<!-- nome -->
												<div class="form-group">
													<input name="alu_nome"type="text" class="form-control" placeholder="Nome Completo" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_nome; ?>"/>
												</div>
												<div class="row row-form">
													<!-- datanas -->
													<div class="cell-md-6 ajusta">
														<input id="calendario" name="alu_dataNas" type="text" placeholder="Data de nascimento" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_dataNas; ?>"/>
													</div>
													<!-- sexo -->
													<div class="cell-md-6">
														<select name="alu_sexo" class="custom-select" id="inputGroupSelect02">
															<option value="<?php echo $registro->alu_sexo; ?>" selected><?php echo $registro->alu_sexo; ?></option>
															<option value="Masculino">Masculino</option>
															<option value="Feminino">Feminino</option>
														</select>
													</div>
												</div>

												<div class="row row-form">
													<!-- necessidade -->
													<div class="cell-md-6 ajusta">
														<select name="alu_necessidade" class="custom-select" id="necessidade" onchange="optionCheck()">
															<option value="<?php echo $registro->alu_necessidade; ?>" selected><?php echo $registro->alu_necessidade; ?></option>
															<option value="Nao">Não</option>
															<option value="Sim">Sim</option>
														</select>
													</div>
													<!-- Tipo_nes -->
													<div class="cell-md-6">
														<select name="alu_tp_necessidade" class="custom-select" id="tp_necessidade" onchange="optionCheck()" disabled="readonly">
															<option value="<?php echo $registro->alu_tp_necessidade; ?>" selected><?php echo $registro->alu_tp_necessidade; ?></option>
															<option value="Cadeirante">Cadeirante</option>
														</select>
													</div>
												</div>

												<div class="row row-form">
													<!-- rg -->
													<div class="cell-md-6 ajusta">
														<input name="alu_rg"type="text" class="form-control" placeholder="RG" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_rg; ?>">
													</div>
													<!-- cpf -->
													<div class="cell-md-6">
														<input id="cpf" name="alu_cpf"type="text" class="form-control" placeholder="CPF" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_cpf; ?>">
													</div>
												</div>

												<div class="row row-form">
													<!-- filiacao1 -->
													<div class="cell-md-6">
														<input name="alu_filiacao1" type="text" class="form-control" placeholder="Responsável 1" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_filiacao1; ?>">
													</div>
													<!-- filiacao1 -->
													<div class="cell-md-6 ajusta">
														<select name="alu_parentesco1" class="custom-select" onchange="optionCheck()">
															<option value="<?php echo $registro->alu_parentesco1; ?>" selected><?php echo $registro->alu_parentesco1; ?></option>
															<option value="Mae">Mãe</option>
															<option value="Pai">Pai</option>
															<option value="Avo<">Avô</option>
															<option value="Avo-">Avó</option>
															<option value="Tia">Tia</option>
															<option value="Tio">Tio</option>
															<option value="Outro">Outro</option>
														</select>
													</div>
												</div>

												<div class="row row-form">
													<!-- filiacao2 -->
													<div class="cell-md-6">
														<input name="alu_filiacao2" type="text" class="form-control" placeholder="Responsável 2" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_filiacao2; ?>">
													</div>
													<!-- filiacao2 -->
													<div class="cell-md-6 ajusta">
														<select name="alu_parentesco2" class="custom-select" onchange="optionCheck()">
															<option value="<?php echo $registro->alu_parentesco2; ?>" selected><?php echo $registro->alu_parentesco2; ?></option>
															<option value="Mãe">Mae</option>
															<option value="Pai">Pai</option>
															<option value="Avô">Avo<</option>
															<option value="Avó">Avo-</option>
															<option value="Tia">Tia</option>
															<option value="Tio">Tio</option>
															<option value="Outro">Outro</option>
														</select>
													</div>
												</div>
											</div><!-- aluno -->

											<!-- contato -->
											<div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="profile-tab">
												<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\ ALUNO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
												<div class="row row-form">
													<!-- telefone -->
													<div class="cell-md-6 ajusta">
														<input id="telefone" name="alu_telefone" type="text" class="form-control" placeholder="Telefone Aluno" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_telefone; ?>">
													</div>
													<!-- celular -->
													<div class="cell-md-6">
														<input id="celular" name="alu_celular" type="text" class="form-control" placeholder="Celular Aluno" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_celular; ?>">
													</div>
												</div>

												<!-- email -->
												<div class="form-group">
													<input name="alu_email" type="email" class="form-control" placeholder="Email Aluno" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_email; ?>" >
												</div>

												<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\ RESPONSÁVEL 1 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
												<div class="row row-form">
													<!-- telefone_responsável1 -->
													<div class="cell-md-6 ajusta">
														<input id="telefone1" name="alu_telefoneResp1" type="text" class="form-control" placeholder="Telefone Responsável 1" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_telefoneResp1; ?>">
													</div>
													<!-- celular_responsável1 -->
													<div class="cell-md-6">
														<input id="celular1" name="alu_celularResp1" type="text" class="form-control" placeholder="Celular Responsável 1" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_celularResp1; ?>">
													</div>
												</div>

												<!-- email_responsável1 -->
												<div class="form-group">
													<input name="alu_emailResp1" type="email" class="form-control" placeholder="Email Responsável 1" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_emailResp1; ?>" >
												</div>

												<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\ RESPONSÁVEL 2 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
												<div class="row row-form">
													<!-- telefone_responsável2 -->
													<div class="cell-md-6 ajusta">
														<input id="telefone2" name="alu_telefoneResp2" type="text" class="form-control" placeholder="Telefone Responsável 2" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_telefoneResp2; ?>">
													</div>
													<!-- celular_responsável2 -->
													<div class="cell-md-6">
														<input id="celular2" name="alu_celularResp2" type="text" class="form-control" placeholder="Celular Responsável 2" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_celularResp2; ?>">
													</div>
												</div>

												<!-- email_responsável2 -->
												<div class="form-group">
													<input name="alu_emailResp2" type="email" class="form-control" placeholder="Email Responsável 2" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_emailResp2; ?>" >
												</div>
											</div><!-- contato -->

											<!-- endereco -->
											<div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="contact-tab">
												<div class="row row-form">
													<!-- logradouro -->
													<div class="cell-md-6 ajusta">
														<input name="alu_logradouro"type="text" class="form-control" placeholder="logradouro" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_logradouro; ?>">
													</div>
													<!-- numero -->
													<div class="cell-md-6">
														<input name="alu_numero"type="text" class="form-control" placeholder="Numero" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_numero; ?>">
													</div>
												</div>

												<div class="row row-form">
													<!-- bairro -->
													<div class="cell-md-6 ajusta">
														<input name="alu_bairro"type="text" class="form-control" placeholder="Bairro" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_bairro; ?>">
													</div>
													<!-- cep -->
													<div class="cell-md-6">
														<input id="cep" name="alu_cep"type="text" class="form-control" placeholder="CEP" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_cep; ?>">
													</div>
												</div>

												<div class="row row-form">
													<!-- cidade -->
													<div class="cell-md-6 ajusta">
														<input name="alu_cidade"type="text" class="form-control" placeholder="Cidade" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_cidade; ?>">
													</div>
													<!-- estado -->
													<div class="cell-md-6">
														<input id="estado" name="alu_estado"type="text" class="form-control" placeholder="Estado" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_estado; ?>">
													</div>
												</div>
											</div><!-- endereco -->
										</div><!-- tab-content -->

										<div class="botoes_form">
											<button type="submit" class="btn btn-success btn-lg btn-block">Atualizar Dados</button>
											<button type="reset" class="btn btn btn-warning btn-lg btn-block">Resetar Campos</button>
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
