<?php 
include_once('bd/conexao.php');

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {

  $pesquisa = $_GET['pesquisa'];

  $sql = "SELECT * FROM clientes 
      WHERE 
        nome LIKE '%{$pesquisa}%' OR 
        email LIKE '%{$pesquisa}%'";

} else {
  $sql = "SELECT * FROM clientes;";
}


$qr = mysqli_query($conexao, $sql);
$clientes = mysqli_fetch_all($qr, MYSQLI_ASSOC);

include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');

 ?>
<div class="col">
<h2 class="titulo">Gestão de clientes</h2>
<span class="badge badge-info totais">Total: <?php echo count($clientes); ?></span>
<div class="clear"></div>
<?php include_once('layout/mensagens.php'); ?>
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
        <a href="#" class="btn btn-secondary"  data-toggle="modal" data-target="#modalVerDados" onclick="verDados(<?php echo $cliente['id']; ?>)"> 
          <i class="fas fa-eye"></i>
        </a>
        <a href="form_cliente.php?id=<?php echo $cliente['id'] ?>" class="btn btn-warning">
          <i class="fas fa-edit"></i>
        </a>
        <a href="gerencia_clientes.php?id=<?php echo $cliente['id']; ?>&acao=deletar" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar?')">
          <i class="fas fa-trash"></i>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
    <!-- /linha para cada elemento -->

  </table>
    <?php if(empty($clientes)): ?>
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
      url: 'gerencia_clientes.php?acao=get&id=' + id,
      type: 'GET',
      beforeSend: function() {
        $('#carregando').fadeIn();
      }
    })
    .done(function(dados){
      var dados_json = JSON.parse(dados);
      var texto = '';
      Object.keys(dados_json).forEach(function(k){
          var th = k.replace('_', ' ');
          texto += `<p><strong style="text-transform: capitalize">${th}</strong>: ${dados_json[k] ?? ''}</p>`;
      }); 
      $('#titulo-modal').html('Cliente: ' + dados_json.nome);
      $('#corpo-modal').html(texto);
    })
    .fail(function(){
      aler('Dados nao encontrados');
    })
    .always(function(){
      $('#carregando').fadeOut();
    });
  }
</script>