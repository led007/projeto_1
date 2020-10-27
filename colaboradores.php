<?php 
include_once('bd/conexao.php');
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');

$sql = "SELECT * FROM colaboradores;";
$qr = mysqli_query($conexao, $sql);
$colaboradores = mysqli_fetch_all($qr, MYSQLI_ASSOC);

?>
<div class="col">
<h2 class="titulo">Colaboradores</h2>
<span class="badge badge-info totais">Total: <?php echo count($colaboradores); ?></span>
<div class="clear"></div>
<?php include_once('layout/mensagens.php'); ?>
  <div class="card">
    <div class="card-body">
      <a href="form_usuario.php" class="btn btn-primary" style="float: right">
        <i class="fas fa-user"></i> Novo Usuario
      </a>
      <a href="javascript:history.back(-1)" class="btn btn-secondary voltar">
        <i class="fas fa-arrow-left"></i> Voltar
      </a>
      <br />
      <br />
      <table class="table table-striped table-hover">
        <tr>
          <th>Nome</th>
          <th>CPF</th>
          <th>Email</th>
          <th>Telefone</th>
          <th class="acao">Ação</th>
        </tr>
        <?php foreach($colaboradores as $chave => $colaborador): ?>
        <tr>
          <td><?= $colaborador['nome'] ?></td>
          <td><?= $colaborador['cpf'] ?></td>
          <td><?= $colaborador['email'] ?></td>
          <td><?= $colaborador['telefone'] ?></td>
          <td>
            <a href="#" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="#" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <a href="gerencia_colaboradores.php?id=<?php echo $colaborador['id']; ?>&acao=deletar" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar?')">
              <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
      </table>

      <nav aria-label="Navegação de página exemplo" class="pagination">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
        </ul>
      </nav>
      
    </div>
  </div>
</div>
</div>
<?php 
include_once('layout/footer.php');
?>