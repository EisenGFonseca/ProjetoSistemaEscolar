<?php include('../../acesso_portal/check_login.php');?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Cadastrar Aluno </title>

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

              <h1 class="hello">Cadastrar Aluno</h1>
              <h2 class="index hello sumir">Preencha o Formulario Abaixo</h2>
              <h3 class="index hello sumir">Forneça os dados necessarios para realizar o cadastro</h3>
            </div> <!-- texto-capa texto-sobre -->
          </div> <!-- imagem-capa capa-lista -->
          <div id="content">

            <section id="cadastrar">
              <div id="Conteiner-Formulario">
                <h3 class="form">Cadastrar Aluno</h1>


                  <form name="Cadastro" class="needs-validation" novalidate action="cadastrar_salvar.php" method="post" onsubmit="return cadastrar();" >

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
                        <!-- nome -->
                        <div class="form-group">
                          <input name="alu_nome"type="text" class="form-control" placeholder="Nome Completo" class="form-control" id="validationCustom01" required>
                        </div>
                        <div class="row row-form">
                          <!-- datanas -->
                          <div class="cell-md-6 ajusta">
                            <input id="calendario" name="alu_dataNas" type="text" placeholder="Data de nascimento" class="form-control" id="validationCustom01" required/>
                          </div>
                          <!-- sexo -->
                          <div class="cell-md-6">
                            <select name="alu_sexo" class="custom-select" id="inputGroupSelect02">
                              <option value="Masculino" se>Masculino</option>
                              <option value="Feminino">Feminino</option>
                            </select>
                          </div>
                        </div>

                        <div class="row row-form">
                          <!-- necessidade -->
                          <div class="cell-md-6 ajusta">
                            <select name="alu_necessidade" class="custom-select" id="necessidade" onchange="optionCheck()">
                              <option value="Nao" selected>Necessidade Especial</option>
                              <option value="Nao">Não</option>
                              <option value="Sim">Sim</option>
                            </select>
                          </div>
                          <!-- Tipo_nes -->
                          <div class="cell-md-6">
                            <select name="alu_tp_necessidade" class="custom-select" id="tp_necessidade" onchange="optionCheck()" disabled="readonly">
                              <option value="Nenhuma" selected>Tipo de Necessidade</option>
                              <option value="Cadeirante">Cadeirante</option>
                            </select>
                          </div>
                        </div>

                        <div class="row row-form">
                          <!-- rg -->
                          <div class="cell-md-6 ajusta">
                            <input name="alu_rg"type="text" class="form-control" placeholder="RG" class="form-control" id="validationCustom01" required>
                          </div>
                          <!-- cpf -->
                          <div class="cell-md-6">
                            <input id="cpf" name="alu_cpf"type="text" class="form-control" placeholder="CPF" class="form-control" id="validationCustom01" required>
                          </div>
                        </div>

                        <div class="row row-form">
                          <!-- filiacao1 -->
                          <div class="cell-md-6">
                            <input name="alu_filiacao1" type="text" class="form-control" placeholder="Responsável 1" class="form-control" id="validationCustom01" required>
                          </div>
                          <!-- filiacao1 -->
                          <div class="cell-md-6 ajusta">
                            <select name="alu_parentesco1" class="custom-select" onchange="optionCheck()">
                              <option value="Mae" selected>Mãe</option>
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
                            <input name="alu_filiacao2" type="text" class="form-control" placeholder="Responsável 2" class="form-control" id="validationCustom01" required>
                          </div>
                          <!-- filiacao2 -->
                          <div class="cell-md-6 ajusta">
                            <select name="alu_parentesco2" class="custom-select" onchange="optionCheck()">
                              <option value="Mae">Mãe</option>
                              <option value="Pai" selected>Pai</option>
                              <option value="Avo<">Avô</option>
                              <option value="Avo-">Avó</option>
                              <option value="Tia">Tia</option>
                              <option value="Tio">Tio</option>
                              <option value="Outro">Outro</option>
                            </select>
                          </div>
                        </div>
                      </div><!-- sobre -->

                      <!-- contato -->
                      <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\ ALUNO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
                        <div class="row row-form">
                          <!-- telefone -->
                          <div class="cell-md-6 ajusta">
                            <input id="telefone" name="alu_telefone" type="text" class="form-control" placeholder="Telefone Aluno" class="form-control" id="validationCustom01" required>
                          </div>
                          <!-- celular -->
                          <div class="cell-md-6">
                            <input id="celular" name="alu_celular" type="text" class="form-control" placeholder="Celular Aluno" class="form-control" id="validationCustom01" required>
                          </div>
                        </div>

                        <!-- email -->
                        <div class="form-group">
                          <input name="alu_email" type="email" class="form-control" placeholder="Email Aluno" class="form-control" id="validationCustom01" required >
                        </div>

                        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\ RESPONSÁVEL 1 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
                        <div class="row row-form">
                          <!-- telefone_responsável1 -->
                          <div class="cell-md-6 ajusta">
                            <input id="telefone1" name="alu_telefoneResp1" type="text" class="form-control" placeholder="Telefone Responsável 1" class="form-control" id="validationCustom01" required>
                          </div>
                          <!-- celular_responsável1 -->
                          <div class="cell-md-6">
                            <input id="celular1" name="alu_celularResp1" type="text" class="form-control" placeholder="Celular Responsável 1" class="form-control" id="validationCustom01" required>
                          </div>
                        </div>

                        <!-- email_responsável1 -->
                        <div class="form-group">
                          <input name="alu_emailResp1" type="email" class="form-control" placeholder="Email Responsável 1" class="form-control" id="validationCustom01" required >
                        </div>

                        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\ RESPONSÁVEL 2 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
                        <div class="row row-form">
                          <!-- telefone_responsável2 -->
                          <div class="cell-md-6 ajusta">
                            <input id="telefone2" name="alu_telefoneResp2" type="text" class="form-control" placeholder="Telefone Responsável 2" class="form-control" id="validationCustom01" required>
                          </div>
                          <!-- celular_responsável2 -->
                          <div class="cell-md-6">
                            <input id="celular2" name="alu_celularResp2" type="text" class="form-control" placeholder="Celular Responsável 2" class="form-control" id="validationCustom01" required>
                          </div>
                        </div>

                        <!-- email_responsável2 -->
                        <div class="form-group">
                          <input name="alu_emailResp2" type="email" class="form-control" placeholder="Email Responsável 2" class="form-control" id="validationCustom01" required >
                        </div>
                      </div><!-- contato -->

                      <!-- endereco -->
                      <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row row-form">
                          <!-- rua -->
                          <div class="cell-md-6 ajusta">
                            <input name="alu_logradouro"type="text" class="form-control" placeholder="Logradouro" class="form-control" id="validationCustom01" required>
                          </div>
                          <!-- numero -->
                          <div class="cell-md-6">
                            <input name="alu_numero"type="text" class="form-control" placeholder="Numero" class="form-control" id="validationCustom01" required>
                          </div>
                        </div>

                        <div class="row row-form">
                          <!-- bairro -->
                          <div class="cell-md-6 ajusta">
                            <input name="alu_bairro"type="text" class="form-control" placeholder="Bairro" class="form-control" id="validationCustom01" required>
                          </div>
                          <!-- cep -->
                          <div class="cell-md-6">
                            <input id="cep" name="alu_cep"type="text" class="form-control" placeholder="CEP" class="form-control" id="validationCustom01" required>
                          </div>
                        </div>

                        <div class="row row-form">
                          <!-- cidade -->
                          <div class="cell-md-6 ajusta">
                            <input name="alu_cidade"type="text" class="form-control" placeholder="Cidade" class="form-control" id="validationCustom01" required>
                          </div>
                          <!-- estado -->
                          <div class="cell-md-6">
                            <input id="estado" name="alu_estado"type="text" class="form-control" placeholder="Estado" class="form-control" id="validationCustom01" required>
                          </div>
                        </div>
                      </div><!-- endereco -->
                    </div><!-- tab-content -->

                    <div class="botoes_form">
                      <button type="submit" class="btn btn-success btn-lg btn-block" onClick="validarSenha()">Cadastrar Aluno</button>
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
