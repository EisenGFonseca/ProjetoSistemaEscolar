<!-- MENU -->
<div data-role="appbar" data-expand-point="md">
	<div data-role="appbar" data-expand-point="md">
		<button type="button" class="hamburger menu-down hidden">
			<span class="line"></span>
			<span class="line"></span>
			<span class="line"></span>
		</button>

    <?php if(isset($_SESSION['user_nome'])) : ?>
  	<div class="aparece">
    <div class="recuo-esq">
		<i class="fas fa-bars fa-2x menu-open" style="font-size: 25px;"></i>
		</div>
		<div class="side-menu-wrapper">

			<img src="http://portaldarmc.com.br/guia-estudante-unicamp/icones/estudante.png" width="60px" style="width: 150px;margin-left: 42px;margin-top: -14px;">
		  <h3 style="color: white; font-size: 30px; margin-left: 38px; margin-bottom: 30px; margin-top: -17px; font-weight: bold; text-shadow: 0 0 20px #000000, 0 0 40px #000000;"> SCHOLARE </h3>

		  <h3 class="link-titulo">Diários</h3>
		  <a class="menu" id="lat_dropdown_frequencia">Frequência</a>
		  <div class="pos-relative">
		    <div data-role="dropdown" data-toggle-element="#lat_dropdown_frequencia" style="background-color: #246dad; padding-left: 20px; display: block; margin-left: -5px;">
		      <a class="menu" href="/construcao/construcao.php" class="servicos_link dropdown-item">Fazer Chamada</a>
		      <a class="menu" href="/construcao/construcao.php" class="servicos_link dropdown-item">Relatório de Frequência</a>
		    </div>
		  </div>
		  <div style="height:10px"></div>
		  <a class="menu" id="lat_dropdown_notas">Notas</a>
		  <div class="pos-relative">
		    <div data-role="dropdown" data-toggle-element="#lat_dropdown_notas" style="background-color: #246dad; padding-left: 20px; display: block; margin-left: -5px;">
		      <a class="menu" href="/construcao/construcao.php" class="servicos_link dropdown-item">Lançar Notas</a>
		      <a class="menu" href="/construcao/construcao.php" class="servicos_link dropdown-item">Boletins</a>
		    </div>
		  </div>

		  <h3 class="link-titulo">Alunos</h3>
		  <a class="menu" id="lat_dropdown_cadastro_alu">Cadastros</a>
		  <div class="pos-relative">
		    <div data-role="dropdown" data-toggle-element="#lat_dropdown_cadastro_alu" style="background-color: #246dad; padding-left: 20px; display: block; margin-left: -5px;">
		      <a class="menu" href="/portal/aluno/cadastrar/cadastrar.php" class="servicos_link dropdown-item">Cadastrar Aluno</a>
		      <a class="menu" href="/portal/aluno/Lista/lista.php" class="servicos_link dropdown-item">Alunos Cadastrados</a>
		    </div>
		  </div>
		  <div style="height:10px"></div>
		  <a class="menu" id="lat_dropdown_matriculas">Matrículas</a>
		  <div class="pos-relative">
		    <div data-role="dropdown" data-toggle-element="#lat_dropdown_matriculas" style="background-color: #246dad; padding-left: 20px; display: block; margin-left: -5px;">
		      <a class="menu" href="/portal/aluno/matricula/matricula.php" class="servicos_link dropdown-item">Matricular Aluno</a>
		      <a class="menu" href="/portal/aluno/matricula/lista_matriculados.php" class="servicos_link dropdown-item">Relação de Matrículas</a>
		    </div>
		  </div>

		  <h3 class="link-titulo">Funcionário</h3>
		  <a class="menu" id="lat_dropdown_cadastro_fun">Cadastros</a>
		  <div class="pos-relative">
		    <div data-role="dropdown" data-toggle-element="#lat_dropdown_cadastro_fun" style="background-color: #246dad; padding-left: 20px; display: block; margin-left: -5px;">
		      <a class="menu" href="/portal/funcionario/cadastrar/cadastrar.php" class="servicos_link dropdown-item">Cadastrar Funcionário</a>
		      <a class="menu" href="/portal/funcionario/Lista/lista.php" class="servicos_link dropdown-item">Gerenciar Funcionário</a>
		    </div>
		  </div>
		  <div style="height:10px"></div>
		<!-- /#sidebar-wrapper -->


		</div>
  </div>
  <?php endif ?>

		<a href="/index.php" class="brand no-hover">
			<img src="https://www.planet-source-code.com/vb/2010Redesign/images/LangugeHomePages/HTML5_CSS_JavaScript.png" height="40" class="d-inline-block align-top" alt="">
		</a>

		<ul class="app-bar-menu">
			<a class="btn btn-light" href="/index.php" title="Index">Início</a>
			<a class="btn btn-light" href="/contato/contato.php" title="Contato">Contato</a>
			<a class="btn btn-light" href="/sobre/sobre.php" title="Sobre o Sistema">Sobre</a>
			<a class="btn btn-light" href="/portal/index_portal.php" title="Acesso Privado">Sistema</a>
		</ul>

    <?php if(isset($_SESSION['user_nome'])) : ?>
			<ul class="app-bar-menu ml-auto collapsed recuo-dir" style="">
				<a class="btn btn-light" href="/portal/acesso_portal/logout.php" title="Sair"><b><?php echo $_SESSION['user_nome'] ?></b></a>
				<a class="btn btn-danger" href="/portal/acesso_portal/logout.php" title="Sair">Sair</a>
			</ul>
    <?php endif ?>
	</div>
</ul>
</div>
