<?php
  include('../../../conexao/conexao.php');

  $sql = "CALL select_alu_cad";
  $consulta = $conn->prepare($sql);
  $consulta->execute();

  $registros = $consulta->fetchAll(PDO::FETCH_OBJ);
?>

<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>

<div class="form-group input-group">
  <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control mr-sm-2" style="border-radius: 5px">
</div>

<div id="container-contatos">
  <div class="table-responsive-xl">
    <table id="tabela" class="table" data-sortable>
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col" class="sumir-tabela">CPF</th>
          <th scope="col" class="sumir-tabela">Celular</th>
          <th scope="col">Filiacao 1</th>
          <th scope="col">Situação</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($registros as $registro) { ?>
          <tr>
            <th scope="row"><?php echo $registro->alu_cod; ?></th>
            <td><?php echo $registro->alu_nome; ?></td>
            <td class="sumir-tabela"><?php echo $registro->alu_cpf; ?></td>
            <td class="sumir-tabela"><?php echo $registro->alu_celular; ?></td>
            <td><?php echo $registro->alu_filiacao1; ?></td>
            <td><?php echo $registro->alu_situacao; ?></td>
            <td>
              <a class="none" href="\portal\aluno\inf_alu.php?alu_cod=<?php echo $registro->alu_cod; ?>"><button type="button" class="btn btn-info btn-lg btn-block"> Ver Mais </button></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script>
$('input#txt_consulta').quicksearch('table#tabela tbody tr');
</script>
