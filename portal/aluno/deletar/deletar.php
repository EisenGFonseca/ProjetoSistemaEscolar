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
    <meta charset="UTF-8">
    <title> Deletar Aluno </title>

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

					<h1 class="hello">Aluno: <?php echo $registro->alu_nome; ?></h1>
					<h2 class="index hello"><b>Deletar</b></h2>
					<h3 class="index hello sumir">Campos não são editáveis</h3>
				</div> <!-- imagem-capa -->
      </div> <!-- texto-capa -->


			<div id="content">

				<section id="cadastrar">
					<div id="Conteiner-Formulario">
						<h3 class="form">Deletar Registro</h1>

							<form name="Deletar" action="deletar_registro.php" method="post" onsubmit="return cadastrar();" >

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
										<input name="alu_cod" type="hidden" value="<?php echo $registro->alu_cod; ?>" disabled="true">
										<!-- nome -->
										<div class="form-group">
											<m class="legenda">Aluno</m>
											<input name="alu_nome"type="text" class="form-control" placeholder="Nome Completo" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_nome; ?>" disabled="true"/>
										</div>
										<div class="row row-form">
											<!-- datanas -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Data de Nascimento</m>
												<input id="calendario" name="alu_dataNas" type="text" placeholder="Data de nascimento" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_dataNas; ?>" disabled="true"/>
											</div>
											<!-- sexo -->
											<div class="cell-md-6">
												<m class="legenda">Sexo</m>
												<select name="alu_sexo" class="custom-select" id="inputGroupSelect02" disabled="readonly">
													<option value="<?php echo $registro->alu_sexo; ?>" selected><?php echo $registro->alu_sexo; ?></option>
													<option value="Masculino">Masculino</option>
													<option value="Feminino">Feminino</option>
												</select>
											</div>
										</div>

										<div class="row row-form">
											<!-- necessidade -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Possuí necessidades Especiais?</m>
												<select name="alu_necessidade" class="custom-select" id="necessidade" onchange="optionCheck()"  disabled="readonly">
													<option value="<?php echo $registro->alu_necessidade; ?>" selected><?php echo $registro->alu_necessidade; ?></option>
												</select>
											</div>
											<!-- Tipo_nes -->
											<div class="cell-md-6">
												<m class="legenda">Tipo de Necessidade</m>
												<select name="alu_tp_necessidade" class="custom-select" id="tp_necessidade" onchange="optionCheck()" disabled="readonly">
													<option value="<?php echo $registro->alu_tp_necessidade; ?>" selected><?php echo $registro->alu_tp_necessidade; ?></option>
													<option value="Cadeirante">Cadeirante</option>
												</select>
											</div>
										</div>

										<div class="row row-form">
											<!-- rg -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">RG</m>
												<input name="alu_rg"type="text" class="form-control" placeholder="RG" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_rg; ?>" disabled="true">
											</div>
											<!-- cpf -->
											<div class="cell-md-6">
												<m class="legenda">CPF</m>
												<input id="cpf" name="alu_cpf"type="text" class="form-control" placeholder="CPF" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_cpf; ?>" disabled="true">
											</div>
										</div>

										<div class="row row-form">
											<!-- filiacao1 -->
											<div class="cell-md-6">
												<m class="legenda">Filiacao 1</m>
												<input name="alu_filiacao1" type="text" class="form-control" placeholder="Responsável 1" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_filiacao1; ?>" disabled="true">
											</div>
											<!-- filiacao1 -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Parentesco</m>
												<select name="alu_parentesco1" class="custom-select" onchange="optionCheck()"  disabled="readonly">
													<option value="<?php echo $registro->alu_parentesco1; ?>" selected><?php echo $registro->alu_parentesco1; ?></option>
												</select>
											</div>
										</div>

										<div class="row row-form">
											<!-- filiacao2 -->
											<div class="cell-md-6">
												<m class="legenda">Filiacao 2</m>
												<input name="alu_filiacao2" type="text" class="form-control" placeholder="Responsável 2" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_filiacao2; ?>" disabled="true">
											</div>
											<!-- filiacao2 -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Parentesco</m>
												<select name="alu_parentesco2" class="custom-select" onchange="optionCheck()"  disabled="readonly">
													<option value="<?php echo $registro->alu_parentesco2; ?>" selected><?php echo $registro->alu_parentesco2; ?></option>
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
												<m class="legenda">Telefone</m>
												<input id="telefone" name="alu_telefone" type="text" class="form-control" placeholder="Telefone Aluno" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_telefone; ?>" disabled="true">
											</div>
											<!-- celular -->
											<div class="cell-md-6">
												<m class="legenda">Celular</m>
												<input id="celular" name="alu_celular" type="text" class="form-control" placeholder="Celular Aluno" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_celular; ?>" disabled="true">
											</div>
										</div>

										<!-- email -->
										<div class="form-group">
											<m class="legenda">Email</m>
											<input name="alu_email" type="email" class="form-control" placeholder="Email Aluno" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_email; ?>" disabled="true" >
										</div>

										<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\ RESPONSÁVEL 1 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
										<div class="row row-form">
											<!-- telefone_responsável1 -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Telefone Responsável 1</m>
												<input id="telefone1" name="alu_telefoneResp1" type="text" class="form-control" placeholder="Telefone Responsável 1" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_telefoneResp1; ?>" disabled="true">
											</div>
											<!-- celular_responsável1 -->
											<div class="cell-md-6">
												<m class="legenda">Clular Responsável 1</m>
												<input id="celular1" name="alu_celularResp1" type="text" class="form-control" placeholder="Celular Responsável 1" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_celularResp1; ?>" disabled="true">
											</div>
										</div>

										<!-- email_responsável1 -->
										<div class="form-group">
											<m class="legenda">Email Responsável 1</m>
											<input name="alu_emailResp1" type="email" class="form-control" placeholder="Email Responsável 1" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_emailResp1; ?>" disabled="true" >
										</div>

										<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\ RESPONSÁVEL 2 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
										<div class="row row-form">
											<!-- telefone_responsável2 -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Telefone Responsável 2</m>
												<input id="telefone2" name="alu_telefoneResp2" type="text" class="form-control" placeholder="Telefone Responsável 2" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_telefoneResp2; ?>" disabled="true">
											</div>
											<!-- celular_responsável2 -->
											<div class="cell-md-6">
												<m class="legenda">Celular Responsável 2</m>
												<input id="celular2" name="alu_celularResp2" type="text" class="form-control" placeholder="Celular Responsável 2" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_celularResp2; ?>" disabled="true">
											</div>
										</div>

										<!-- email_responsável2 -->
										<div class="form-group">
											<m class="legenda">Email Responsável 2</m>
											<input name="alu_emailResp2" type="email" class="form-control" placeholder="Email Responsável 2" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_emailResp2; ?>" disabled="true" >
										</div>
									</div><!-- contato -->

									<!-- endereco -->
									<div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="contact-tab">
										<div class="row row-form">
											<!-- logradouro -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Nome</m>
												<input name="alu_logradouro"type="text" class="form-control" placeholder="logradouro" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_logradouro; ?>" disabled="true">
											</div>
											<!-- numero -->
											<div class="cell-md-6">
												<m class="legenda">Nome</m>
												<input name="alu_numero"type="text" class="form-control" placeholder="Numero" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_numero; ?>" disabled="true">
											</div>
										</div>

										<div class="row row-form">
											<!-- bairro -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Nome</m>
												<input name="alu_bairro"type="text" class="form-control" placeholder="Bairro" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_bairro; ?>" disabled="true">
											</div>
											<!-- cep -->
											<div class="cell-md-6">
												<m class="legenda">Nome</m>
												<input id="cep" name="alu_cep"type="text" class="form-control" placeholder="CEP" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_cep; ?>" disabled="true">
											</div>
										</div>

										<div class="row row-form">
											<!-- cidade -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Nome</m>
												<input name="alu_cidade"type="text" class="form-control" placeholder="Cidade" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_cidade; ?>" disabled="true">
											</div>
											<!-- estado -->
											<div class="cell-md-6">
												<m class="legenda">Nome</m>
												<input id="estado" name="alu_estado"type="text" class="form-control" placeholder="Estado" class="form-control" id="validationCustom01" required value="<?php echo $registro->alu_estado; ?>" disabled="true">
											</div>
										</div>
									</div><!-- endereco -->
								</div><!-- tab-content -->

								<br  Use readonly="true"/>
								<h5>Deseja realmente exluir este registro?</h5>

								<div class="botoes_form">
									<a href="/portal/funcionario/Lista/lista.php" class="btn btn-success btn-lg btn-block" role="button"> Cancelar </a>
									<button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter"> Deletar </button>
								</div>

								<!-- Modal -->
								<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalCenterTitle">Deseja mesmo deletar este registro?</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												Uma vez deletado, não será possivel recuperá-lo!
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-success" data-dismiss="modal"> Cancelar </button>
												<button type="submit" class="btn btn-danger"  onclick="funcao_alerta()"> Deletar </button>
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
