<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');

?>

<div class="col">
<h2 class="titulo">Serviços</h2>
<span class="badge badge-info totais">Total: <?php //echo count($servicos); ?></span>
<div class="clear"></div>
  <?php include_once('layout/mensagens.php'); ?>

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
      <thead>
      <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

      <div class="alert alert-info" id="mensagem-vazio" style="display: none;">Nenhuma Informação encontrada.</div>

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
<script>
  $(document).ready(function() {
    carregaDados();
  });
  function verDados(id) {
    $.ajax({
      url: `api/servicos.php?id=${id}&acao=exibir`,
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#carregando').fadeIn();
      } 
    })
    .done(function(data) {
      var texto = '';
      Object.keys(data.dados).forEach(function(index) {
          var th = index.replace('_', ' ');
          texto += `<p><strong
                style ="text-transform: capitalize">
                ${th}</strong>: ${data.dados[index] ?? ''}</p>`;
      });

      $('#titulo-modal').html(`Servico: ${data.dados.nome}` );
      $('#corpo-modal').html(texto);


    })
    .fail(function() {
      alert('Dados não Encontrados.')
      })
    .always(function() {
      $('#carregando').fadeOut();
    });

    }

    function carregaDados() {
      $.ajax({
        url: 'api/servicos.php?acao=listar',
        type: 'GET',
        dataType: 'json',
        beforeSend: function() {
          $('#carregando').fadeIn();
        }
      })
      .done(function(data) {
        if (data.dados.length < 1) {
          $('#mensagem-vazio').fadeIn();
        }
        var tbody = '';
        $.each(data.dados,function(index, value){
          tbody += `<tr>
                    <td>${value.codigo}</td>
        <td>${value.nome}</td>
        <td>${value.descricao}</td>
        <td>${value.preco}</td>
        <td>${value.categoria_id}</td>
        <td>
          <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalVerDados" onclick="verDados(${value.id})">
            <i class="fas fa-eye"></i>
          </a>
          <a href="form_servicos.php?id=${value.id}" class="btn btn-warning">
            <i class="fas fa-edit"></i>
          </a>
           <a href="gerencia_servicos.php?id=${value.id}&acao=deletar" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?')">
          <i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>`;
        });
        $('tbody').html(tbody);
      })
      .fail(function(data) {
        console.log(data);
      })
      .always(function() {
        $('#carregando').fadeOut();
      });

    }
</script>