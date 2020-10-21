<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
include_once('bd/clientes.php');//lista de clientes em array
 ?>
<div class="col">
  <h2>Gestão de clientes</h2>
  <div class="card">
    <div class="card-body">

      <a href="form_cliente.php" class="btn btn-primary" style="float: right">
        <i class="fas fa-user"></i> Novo cliente
      </a>
      <a href="javascript:history.back(-1)" class="btn btn-secondary voltar">
        <i class="fas fa-arrow-left"></i> Voltar
      </a>
      <br>
      <br>
      <table class="table table-striped table-hover">
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>CPF</th>
      <th>Telefone</th>
      <th>E-mail</th>
      <th>Convênio</th>
      <th>Ações</th>
    </tr>
    <!-- linha para cada elemento -->
    <?php foreach($clientes as $chave => $cliente): ?>
    <tr>
      <td><?php echo $chave + 1; ?></td>
      <td><?= $cliente['nome'] ?></td>
      <td><?= $cliente['cpf'] ?></td>
      <td><?= $cliente['telefone']  ?></td>
      <td>
        <a href="mailto:<?= $cliente['email']  ?>">
          <?= $cliente['email']  ?>
        </a>
      </td>
      <td><?= $cliente['convenio']  ?></td>
      <td>
        <a href="#" class="btn btn-secondary">
          <i class="fas fa-eye"></i>
        </a>
        <a href="#" class="btn btn-warning">
          <i class="fas fa-edit"></i>
        </a>
        <a href="#" class="btn btn-danger">
          <i class="fas fa-trash"></i>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
    <!-- /linha para cada elemento -->

  </table>

  <nav aria-label="Navegação de página exemplo">
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

<?php 
  include_once('layout/footer.php');
?>