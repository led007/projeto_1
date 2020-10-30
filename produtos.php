<?php 
include_once('bd/conexao.php');

//Monta a consulta a ser executada
$sql = "SELECT p.*, c.categoria 
        FROM produtos p 
        LEFT JOIN categoria c ON p.categoria_id = c.id
        WHERE c.tipo = 'Produtos'";

//Execução da consulta ao banco de dados
$qr = mysqli_query($conexao, $sql);

//Armazenando o resultado em uma variável
$produtos = mysqli_fetch_all($qr, MYSQLI_ASSOC);

include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
?>

<div class="col">
  <h2>Produtos</h2>
  <span class="badge badge-info totais">Total: <?php echo count($produtos); ?></span>
<div class="clear"></div>
  <?php include_once('layout/mensagens.php'); ?>

  <div class="card">
    <div class="card-body">
      <a href="form_produtos.php" class="btn btn-primary" style="float: right">
        <i class="fas fa-cart-plus"></i> Novo Produto
      </a>
      <a href="javascript:history.back(-1)" class="btn btn-secondary voltar">
        <i class="fas fa-arrow-left"></i> Voltar
      </a>
      <br>
      <br>

      <table class="table table-striped table-hover">
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Estoque</th>
            <th>Data Compra</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
          <?php foreach($produtos as $produto): 
        ?>
          <tr>
            <td><?php echo $produto['codigo']; ?></td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['categoria'] ?></td>
            <td><?php echo $produto['estoque'] ?></td>
            <td><?php echo $produto['data_compra'] ?></td>
            <td><?php echo number_format($produto['preco'], 2,',','.'); ?></td>
            <td>
              <a href="#" class="btn btn-secondary">
                <i class="fas fa-eye"></i>
              </a>
              <a href="form_produtos.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning">
                <i class="fas fa-edit"></i>
              </a>
              <a href="gerencia_produtos.php?id=<?php echo $produto['id']; ?>&acao=deletar" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar?')">
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
<?php include_once('layout/footer.php'); ?>