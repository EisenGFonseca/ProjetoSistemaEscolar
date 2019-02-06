<?php
	include('../acesso_portal/check_login.php');

	include('../../conexao/conexao.php');

		$alu_cod = $_GET['alu_cod'];

		if(empty($alu_cod = $_GET['alu_cod'])){
			header('location:lista.php');
		}else{

			$sql = "SELECT * FROM aluno WHERE alu_cod = :alu_cod";

			$consulta = $conn->prepare($sql);
			$consulta->bindParam(':alu_cod', $alu_cod);
			$consulta->execute();

			$registro = $consulta->fetch(PDO::FETCH_OBJ);

			if( $registro->alu_situacao == 'Matriculado'){

				$subsql = "SELECT * FROM Matricula_do_Aluno WHERE Cod = :alu_cod";
				$subconsulta = $conn->prepare($subsql);
				$subconsulta->bindParam(':alu_cod', $alu_cod);
				$subconsulta->execute();

				$subregistros = $subconsulta->fetch(PDO::FETCH_OBJ);
			}
		}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Sobre Aluno</title>

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

							<h1 class="hello">Aluno:</h1>
							<h2 class="index hello"><b><?php echo $registro->alu_nome; ?></b></h2>
							<h3 class="index hello sumir">...</h3>
						</div> <!-- imagem-capa -->
					</div> <!-- texto-capa -->

					<div id="content">
						<div id="fulano">
							<h3 class="esq-preta barra"><b>Infomações Pessoais</b></h3>
							<h4 class="esq-preta barra-sub"><b>Pessoais</b></h4>
							<h6 class="esq-preta"><b>Nome Completo:</b> <?php echo $registro->alu_nome; ?></h6>
							<h6 class="esq-preta"><b>Dt. Nascimento:</b> <?php echo $registro->alu_dataNas; ?></h6>
							<h6 class="esq-preta"><b>Sexo:</b> <?php echo $registro->alu_sexo; ?></h6>
							<h6 class="esq-preta"><b>RG:</b> <?php echo $registro->alu_rg; ?></h6>
							<h6 class="esq-preta"><b>CPF:</b> <?php echo $registro->alu_cpf; ?></h6>
							<br />
							<h4 class="esq-preta barra-sub"><b>Contato</b></h4>
							<h6 class="esq-preta"><b>Telefone:</b> <?php echo $registro->alu_telefone; ?></h6>
							<h6 class="esq-preta"><b>Celular:</b> <?php echo $registro->alu_celular; ?></h6>
							<h6 class="esq-preta"><b>Email:</b> <?php echo $registro->alu_email; ?></h6>
							<br />
							<h4 class="esq-preta barra-sub"><b>Responsável 1:</b> <?php echo $registro->alu_parentesco1; ?></h4>
							<h6 class="esq-preta"><b>Responsável 1:</b> <?php echo $registro->alu_filiacao1; ?></h6>
							<h6 class="esq-preta"><b>Celular:</b> <?php echo $registro->alu_celularResp1; ?></h6>
							<h6 class="esq-preta"><b>Telefone:</b> <?php echo $registro->alu_telefoneResp1; ?></h6>
							<h6 class="esq-preta"><b>Email:</b> <?php echo $registro->alu_emailResp1; ?></h6>
							<br />
							<h4 class="esq-preta barra-sub"><b>Responsável 2:</b> <?php echo $registro->alu_parentesco2; ?></h4>
							<h6 class="esq-preta"><b>Responsável 2:</b> <?php echo $registro->alu_filiacao2; ?></h6>
							<h6 class="esq-preta"><b>Celular:</b> <?php echo $registro->alu_celularResp2; ?></h6>
							<h6 class="esq-preta"><b>Telefone:</b> <?php echo $registro->alu_telefoneResp2; ?></h6>
							<h6 class="esq-preta"><b>Email:</b> <?php echo $registro->alu_emailResp2; ?></h6>
							<br />
							<h4 class="esq-preta barra-sub"><b>Endereço</b></h4>
							<h6 class="esq-preta"><b>Logradouro:</b> <?php echo $registro->alu_logradouro; ?></h6>
							<h6 class="esq-preta"><b>Bairro:</b> <?php echo $registro->alu_bairro; ?></h6>
							<h6 class="esq-preta"><b>CEP:</b> <?php echo $registro->alu_cep; ?></h6>
							<h6 class="esq-preta"><b>Cidade::</b> <?php echo $registro->alu_cidade; ?></h6>
							<h6 class="esq-preta"><b>Estado:</b> <?php echo $registro->alu_estado; ?></h6>
							<br />

							<?php if( $registro->alu_situacao == 'Cadastrado') : ?>
								<h4 class="esq-preta barra-sub"><b>Sobre:</b></h4>
								<h6 class="esq-preta"><b>Situação:</b> <?php echo $registro->alu_situacao; ?></h6>
								<a href="/portal/aluno/matricula/matricula.php?alu_nome=<?php echo $registro->alu_nome; ?>"class="btn btn-success" role="button">Matricular Aluno</button></a>
								<br />
							<?php endif ?>

							<?php if( $registro->alu_situacao == 'Matriculado'): ?>
								<h4 class="esq-preta barra-sub"><b>Sobre Matrícula:</b></h4>
								<h6 class="esq-preta"><b>Situação:</b> <?php echo $registro->alu_situacao; ?></h6>
								<h6 class="esq-preta"><b>Turma:</b> <?php echo $subregistros->Turma; ?></h6>
								<h6 class="esq-preta"><b>Responsável:</b> <?php echo $subregistros->Responsavel; ?></h6>
								<h6 class="esq-preta"><b>Celular_Responsável:</b> <?php echo $subregistros->Celular_Responsavel; ?></h6>
								<h6 class="esq-preta"><b>Triagem:</b> <?php echo $subregistros->Triagem; ?></h6>
								<h6 class="esq-preta"><b>Observações:</b> <?php echo $subregistros->Observacoes; ?></h6>
								<h6 class="esq-preta"><b>Data:</b> <?php echo $subregistros->Data_Matricula; ?></h6>
								<br />
							<?php endif ?>

							<br />

							<a href="/portal/aluno/atualizar/atualizar.php?alu_cod=<?php echo $registro->alu_cod; ?>"class="btn btn-warning btn-lg btn-block" role="button">Editar informações</button></a>
							<a href="/portal/aluno/deletar/deletar.php?alu_cod=<?php echo $registro->alu_cod; ?>" class="btn btn-danger btn-lg btn-block" role="button">Excluir Aluno</button></a>
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
