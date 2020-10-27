<?php 
include_once('bd/conexao.php');

//Monta a consulta a ser executada
$sql = "SELECT * FROM servicos";

//Execução da consulta ao banco de dados
$qr = mysqli_query($conexao, $sql);

//Armazenando o resultado em uma variável
$servicos = mysqli_fetch_all($qr, MYSQLI_ASSOC);

include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
?>
<div class="col">
<h2 class="titulo">Serviços</h2>
<span class="badge badge-info totais">Total: <?php echo count($servicos); ?></span>
<div class="clear"></div>
<?php if(isset($_GET['mensagem'])): ?>
    <div class="alert alert-<?php echo $_GET['alert'] ?? 'success'; ?>" id="alert-mensagem">
      <?php echo $_GET['mensagem']; ?>
    </div>
  <?php endif; ?>
    <div class="card">
      <div class="card-body">

        <a href="form_servicos.php" class="btn btn-primary" style="float: right">
          <i class="fas fa-cart-plus"></i> Novo serviço
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
        <th>Descrição</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Ações</th>
      </tr>
      <?php foreach($servicos as $servico): 
        ?>
      <tr>
        <td><?= $servico['codigo'] ?></td>
        <td><?= $servico['nome'] ?></td>
        <td><?= $servico['descricao'] ?></td>
        <td><?= number_format($servico['preco'],2,',','.') ?></td>
        <td><?= $servico['categoria_id'] ?></td>
        <td>
          <a href="#" class="btn btn-secondary">
            <i class="fas fa-eye"></i>
          </a>
          <a href="#" class="btn btn-warning">
            <i class="fas fa-edit"></i>
          </a>
           <a href="gerencia_servicos.php?id=<?php echo $servico['id']; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?')">
          <i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>

    <nav ar
    ia-label="Navegação de página exemplo">
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
<?php include_once('layout/footer.php');
?>