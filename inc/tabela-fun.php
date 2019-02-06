<?php
{
  include('../../../conexao/conexao.php');

  $sql = "CALL select_fun";
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
          <th scope="col" class="sumir-tabela">Cargo</th>
          <th scope="col" class="sumir-tabela">Celular</th>
          <th scope="col">Email</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($registros as $registro) { ?>
          <tr>
            <th scope="row"><?php echo $registro->fun_cod; ?></th>
            <td><?php echo $registro->fun_nome; ?></td>
            <td class="sumir-tabela"><?php echo $registro->fun_funcao; ?></td>
            <td class="sumir-tabela"><?php echo $registro->fun_celular; ?></td>
            <td><?php echo $registro->fun_email; ?></td>
            <td>
              <a class="none" href="/portal/funcionario/fulano.php?fun_cod=<?php echo $registro->fun_cod; ?>"><button type="button" class="btn btn-info btn-lg btn-block"> Ver Mais </button></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
