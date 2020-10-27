<?php 
include_once('bd/conexao.php');

//Monta a consulta a ser executada
$sql = "SELECT * FROM categoria";

//Execução da consulta ao banco de dados
$qr = mysqli_query($conexao, $sql);

//Armazenando o resultado em uma variável
$categorias = mysqli_fetch_all($qr, MYSQLI_ASSOC);

include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');

?>
<div class="col">
  <h2 class="titulo">Categorias</h2>
  <span class="badge badge-info totais">Total: <?php echo count($categorias); ?></span>
  <div class="clear"></div>

<?php include_once('layout/mensagens.php'); ?>

  <div class="card">
    <div class="card-body">
      <a href="form_categorias.php" class="btn btn-primary" style="float: right">
        <i class="fas fa-user"></i> Nova categoria
      </a>
      <a href="javascript:history.back(-1)" class="btn btn-secondary voltar">
        <i class="fas fa-arrow-left"></i> Voltar
      </a>
      <br>
      <br>
      <table class="table table-striped table-hover">
      <tr>
        <th>Categoria</th>
        <th class="acao">Ações</th>
      </tr>
      <?php foreach($categorias as $chave => $categoria): ?>
    <tr>
      <td><?= $categoria['categoria'] ?></td>
    
      <td>
        <a href="#" class="btn btn-secondary">
          <i class="fas fa-eye"></i>
        </a>
        <a href="#" class="btn btn-warning">
          <i class="fas fa-edit"></i>
        </a>
        <a href="gerencia_categorias.php?id=<?php echo $categoria['id']; ?>&acao=deletar" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?')">
          <i class="fas fa-trash"></i>
        </a>
      </td>

    </tr>
  <?php endforeach; ?>
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