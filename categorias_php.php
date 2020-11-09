<?php 
include_once('bd/conexao.php');

//Monta a consulta a ser executada
if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {
  $pesquisa = $_GET['pesquisa'];

  $sql = "SELECT * FROM categoria 
          WHERE 
            categoria LIKE '%{$pesquisa}%' OR
            tipo LIKE '%{$pesquisa}%'";
} else {
  $sql = "SELECT * FROM categoria";
}

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
        <th>Tipo</th>
        <th class="acao">Ações</th>
      </tr>
      <?php foreach($categorias as $chave => $categoria): ?>
    <tr>
      <td><?= $categoria['categoria'] ?></td>
      <td><?= $categoria['tipo'] ?></td>
    
      <td>
        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalVerDados" onclick="verDados(<?php echo $categoria['id']; ?>)">
          <i class="fas fa-eye"></i>
        </a>
        <a href="form_categorias.php?id=<?php echo $categoria['id']; ?>" class="btn btn-warning">
          <i class="fas fa-edit"></i>
        </a>
        <a href="gerencia_categorias.php?id=<?php echo $categoria['id']; ?>&acao=deletar" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?')">
          <i class="fas fa-trash"></i>
        </a>
      </td>

    </tr>
  <?php endforeach; ?>
  </table>
  <?php if(empty($categorias)): ?>
    <div class="alert alert-info">Nenhuma informação encontrada.</div>
  <?php endif; ?>

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
<script>
  function verDados(id) {
    $.ajax({
      url: `gerencia_categorias.php?id=${id}&acao=get`,
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#carregando').fadeIn();
      }
    })
    .done(function(dados) {
      var texto = '';
      Object.keys(dados).forEach(function(index){
        var th = index.replace('_', ' ');
        texto += `<p><strong style="text-transform: capitalize">${th}: </strong> ${dados[index] ?? ''}</p>`;
      })

      $('#titulo-modal').html(`Categoria: ${dados.categoria}` );
      $('#corpo-modal').html(texto);

    })
    .fail(function() {
      alert('Erro ao buscar os dados.')
    })
    .always(function() {
      $('#carregando').fadeOut();
    });
    
  }
</script>