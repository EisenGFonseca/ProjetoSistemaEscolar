<?php
{
  include('../../../conexao/conexao.php');

  $sql = "SELECT * from Matricula_do_Aluno";
  $consulta = $conn->prepare($sql);
  $consulta->execute();

  $registros = $consulta->fetchAll(PDO::FETCH_OBJ);
}
?>

<div id="container-contatos">
  <div class="table-responsive-xl">
    <table class="table" data-sortable>
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Turma</th>
          <th scope="col" class="sumir-tabela">Responsável</th>
          <th scope="col" class="sumir-tabela">Triagem</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($registros as $registro) { ?>
          <tr>
            <th scope="row"><?php echo $registro->Cod; ?></th>
            <td><?php echo $registro->Aluno; ?></td>
            <td class="sumir-tabela"><?php echo $registro->Turma; ?></td>
            <td class="sumir-tabela"><?php echo $registro->Responsavel; ?></td>
            <td><?php echo $registro->Triagem; ?></td>
            <td>
              <a class="none" href="/portal/aluno/inf_alu.php?alu_cod=<?php echo $registro->Cod; ?>"><button type="button" class="btn btn-info btn-lg btn-block"> Ver Mais </button></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
