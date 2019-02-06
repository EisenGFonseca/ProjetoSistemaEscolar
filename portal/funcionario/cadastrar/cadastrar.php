  <?php include('../../acesso_portal/check_login.php');?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Cadastrar </title>

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

              <h1 class="hello">Cadastrar Funcionário</h1>
              <h2 class="index hello sumir">Preencha o Formulario abaixo</h2>
              <h3 class="index hello sumir">Caso selecione a função Administrador, o campo 'senha' será habilitado</h3>
            </div> <!-- imagem-capa -->
          </div> <!-- texto-capa -->
          <div id="content">

            <section id="cadastrar">
              <div id="Conteiner-Formulario">
                <h3 class="form">Cadastrar Funcionário</h1>

                  <form name="Cadastro" class="needs-validation" novalidate action="cadastrar_salvar.php" method="post" onsubmit="return cadastrar();" >
                    <!-- nome -->
                    <div class="form-group">
                      <input name="fun_nome"type="text" class="form-control" placeholder="Nome Completo" class="form-control" id="validationCustom01" required>
                    </div>
                    <div class="row row-form">
                      <!-- datanas -->
                      <div class="cell-md-6 ajusta">
                        <input id="calendario" name="fun_dataNas" type="text" placeholder="Data de nascimento" class="form-control" id="validationCustom01" required/>
                      </div>
                      <!-- sexo -->
                      <div class="cell-md-6">
                        <select name="fun_sexo"class="custom-select" id="inputGroupSelect02">
                          <option value="Masculino" selected>Masculino</option>
                          <option value="Feminino">Feminino</option>
                        </select>
                      </div>
                    </div>

                    <div class="row row-form">
                      <!-- rg -->
                      <div class="cell-md-6 ajusta">
                        <input name="fun_rg"type="text" class="form-control" placeholder="RG" class="form-control" id="validationCustom01" required>
                      </div>
                      <!-- cpf -->
                      <div class="cell-md-6">
                        <input id="cpf" name="fun_cpf"type="text" class="form-control" placeholder="CPF" class="form-control" id="validationCustom01" required>
                      </div>
                    </div>

                    <div class="row row-form">
                      <!-- telefone -->
                      <div class="cell-md-6 ajusta">
                        <input id="telefone" name="fun_telefone" type="text" class="form-control" placeholder="Telefone" class="form-control" id="validationCustom01" required>
                      </div>
                      <!-- celular -->
                      <div class="cell-md-6">
                        <input id="celular" name="fun_celular" type="text" class="form-control" placeholder="Celular" class="form-control" id="validationCustom01" required>
                      </div>
                    </div>

                    <!-- email -->
                    <div class="form-group">
                      <input name="fun_email" type="email" class="form-control" placeholder="Email" class="form-control" id="validationCustom01" required >
                    </div>

                    <div class="row row-form">
                      <!-- logradouro -->
                      <div class="cell-md-6 ajusta">
                        <input name="fun_logradouro"type="text" class="form-control" placeholder="Logradouro" class="form-control" id="validationCustom01" required>
                      </div>
                      <!-- numero -->
                      <div class="cell-md-6">
                        <input name="fun_numero"type="text" class="form-control" placeholder="Numero" class="form-control" id="validationCustom01" required>
                      </div>
                    </div>

                    <div class="row row-form">
                      <!-- bairro -->
                      <div class="cell-md-6 ajusta">
                        <input name="fun_bairro"type="text" class="form-control" placeholder="Bairro" class="form-control" id="validationCustom01" required>
                      </div>
                      <!-- cep -->
                      <div class="cell-md-6">
                        <input id="cep" name="fun_cep"type="text" class="form-control" placeholder="CEP" class="form-control" id="validationCustom01" required>
                      </div>
                    </div>

                    <div class="row row-form">
                      <!-- cidade -->
                      <div class="cell-md-6 ajusta">
                        <input name="fun_cidade"type="text" class="form-control" placeholder="Cidade" class="form-control" id="validationCustom01" required>
                      </div>
                      <!-- estado -->
                      <div class="cell-md-6">
                        <input id="estado" name="fun_estado"type="text" class="form-control" placeholder="Estado" class="form-control" id="validationCustom01" required>
                      </div>
                    </div>

                    <div class="row row-form">
                      <!-- funcao -->
                      <div class="cell-md-6 ajusta">
                        <select name="fun_funcao"class="custom-select" id="funcao" onchange="optionCheck()">
                          <option value="Professor" selected>Professor</option>
                          <option value="Diretor">Diretor</option>
                          <option value="Secretário">Secretário</option>
                          <option value="Terceirizado">Terceirizado</option>
                        </select>
                      </div>
                      <!-- fun_cargaHoraria -->
                      <div class="cell-md-6">
                        <select name="fun_cargaHoraria"class="custom-select" id="carga" onchange="optionCheck()">
                          <option value="20h" selected>20h</option>
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
                        <input name="fun_login" type="text" class="form-control" placeholder="Login" class="form-control" id="validationCustom01" required/>
                      </div>
                      <!-- senha -->
                      <div class="cell-md-6">
                        <input name="fun_senha" type="password" class="form-control" placeholder="Senha" class="form-control" id="validationCustom01" required/>
                      </div>
                    </div>

                    <div class="botoes_form">
                      <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar Funcionario</button>
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
