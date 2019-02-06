<?php
	{
		include('../../acesso_portal/check_login.php');
	}
	{
		include('../../../conexao/conexao.php');{

			if(empty($_GET['fun_cod'])){
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
    <title> Deletar <?php echo $registro->fun_nome; ?> </title>

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

							<h1 class="hello">Deletar Informações</h1>
							<h2 class="index hello sumir">Deletar Informações sobre empregregado</h2>
							<h3 class="index hello sumir">...</h3>
						</div> <!-- imagem-capa -->
					</div> <!-- texto-capa -->
					<div id="content">

						<section id="cadastrar">
							<div id="Conteiner-Formulario">
								<h3 class="form">Atualizar Dados</h1>

									<form name="Cadastro" action="deletar_registro.php" method="post" onsubmit="return cadastrar();" >

										<input name="fun_cod" type="hidden" value="<?php echo $registro->fun_cod; ?>" Use readonly="true"/>
										<!-- nome -->
										<div class="form-group">
											<m class="legenda">Nome</m>
											<input name="fun_nome" type="text" class="form-control" value="<?php echo $registro->fun_nome; ?>" Use readonly="true"/>
										</div>
										<div class="row row-form">
											<!-- datanas -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Data de Nascimento</m>
												<input name="fun_dataNas" type="text" class="form-control" value="<?php echo $registro->fun_dataNas; ?>" Use readonly="true"/>
											</div>
											<!-- sexo -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Sexo</m>
												<input name="fun_sexo" type="text" class="form-control" value="<?php echo $registro->fun_sexo; ?>" Use readonly="true"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- rg -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">RG</m>
												<input name="fun_rg" type="text" class="form-control" value="<?php echo $registro->fun_rg; ?>" Use readonly="true"/>
											</div>
											<!-- cpf -->
											<div class="cell-md-6">
												<m class="legenda">CPF</m>
												<input name="fun_cpf" type="text" class="form-control" value="<?php echo $registro->fun_cpf; ?>" Use readonly="true"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- telefone -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Telefone</m>
												<input  name="fun_telefone" type="text" class="form-control" value="<?php echo $registro->fun_telefone; ?>" Use readonly="true"/>
											</div>
											<!-- celular -->
											<div class="cell-md-6">
												<m class="legenda">Celular</m>
												<input name="fun_celular" type="text" class="form-control" class="form-control" value="<?php echo $registro->fun_celular; ?>" Use readonly="true"/>
											</div>
										</div>
										<!-- email -->
										<div class="form-group">
											<m class="legenda">Email</m>
											<input name="fun_email" type="email" class="form-control" value="<?php echo $registro->fun_email; ?>" Use readonly="true"/>
										</div>
										<div class="row row-form">
											<!-- logra -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Rua</m>
												<input name="fun_logradouro" type="text" class="form-control" value="<?php echo $registro->fun_logradouro; ?>" Use readonly="true"/>
											</div>
											<!-- numero -->
											<div class="cell-md-6">
												<m class="legenda">Número</m>
												<input name="fun_numero" type="text" class="form-control" value="<?php echo $registro->fun_numero; ?>" Use readonly="true"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- bairro -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Bairro</m>
												<input name="fun_bairro" type="text" class="form-control" value="<?php echo $registro->fun_bairro; ?>" Use readonly="true"/>
											</div>
											<!-- cep -->
											<div class="cell-md-6">
												<m class="legenda">CEP</m>
												<input name="fun_cep" type="text" class="form-control" value="<?php echo $registro->fun_cep; ?>" Use readonly="true"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- cidade -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Cidade</m>
												<input name="fun_cidade" type="text" class="form-control" value="<?php echo $registro->fun_cidade; ?>" Use readonly="true"/>
											</div>
											<!-- estado -->
											<div class="cell-md-6">
												<m class="legenda">Estado</m>
												<input id="estado" name="fun_estado" type="text" class="form-control" value="<?php echo $registro->fun_estado; ?>" Use readonly="true"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- funcao -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Função</m>
												<input name="fun_funcao" type="text" class="form-control" value="<?php echo $registro->fun_funcao; ?>" Use readonly="true"/>
											</div>
											<!-- fun_cargaHoraria -->
											<div class="cell-md-6">
												<m class="legenda">Carga Horária</m>
												<input name="fun_cargaHoraria" type="text" class="form-control" value="<?php echo $registro->fun_cargaHoraria; ?>" Use readonly="true"/>
											</div>
										</div>

										<div class="row row-form">
											<!-- login -->
											<div class="cell-md-6 ajusta">
												<m class="legenda">Login</m>
												<input name="fun_login" type="text" class="form-control" value="<?php echo $registro->fun_login; ?>" Use readonly="true"/>
											</div>
											<!-- senha -->
											<div class="cell-md-6">
												<m class="legenda">Senha</m>
												<input name="fun_senha" type="password" class="form-control" value="<?php echo $registro->fun_senha; ?>" Use readonly="true"/>
											</div>
										</div>

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
