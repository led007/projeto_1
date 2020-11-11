<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
?>
<div class="col">
  <h2 class="titulo">Equipamentos</h2>
  <div class="clear"></div>
  <?php include_once('layout/mensagens.php'); ?>

  <div class="card">
    <div class="card-body">
      <a href="form_equipamentos.php" class="btn btn-primary" style="float: right">
        <i class="fas fa-cart-plus"></i> Novo equipamentos
      </a>
      <a href="javascript:history.back(-1)" class="btn btn-secondary voltar">
        <i class="fas fa-arrow-left"></i> Voltar
      </a>
      <br />
      <br />
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Data de Compra</th>
            <th class="acao">Ação</th>
          </tr>
        </thead>
        <tbody>
        </tbody>  
      </table>
      <div class="alert alert-info" id="mensagem-vazio" style="display: none;">Nenhuma informação encontrada.</div>
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
<?php 
  include_once('layout/footer.php');
?>
<script>
  var algumacoisa
  $(document).ready(function() {
    carregaDados();
  });
  function verDados(id) {
    $.ajax({
      url: `api/equipamentos.php?id=${id}&acao=exibir`,
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#carregando').fadeIn();
      }
    })
    .done(function(data) {
      var texto = '';
      Object.keys(data.dados).forEach(function(index){
        var th = index.replace('_', ' ');
        texto += `<p><strong style="text-transform: capitalize">${th}: </strong> ${data.dados[index] ?? ''}</p>`;
      })

      $('#titulo-modal').html(`Equipamento: ${data.dados.equipamento}` );
      $('#corpo-modal').html(texto);

    })
    .fail(function() {
      alert('Erro ao buscar os dados.')
    })
    .always(function() {
      $('#carregando').fadeOut();
    });
    
  }

  function deletarDados(id) {
    if(confirm('Deseja realmente excluir?')){
      $.ajax({
        url: 'api/equipamentos.php?acao=deletar&id=' + id,
        type: 'DELETE',
        dataType: 'json',
        beforeSend: function() {
          $('#carregando').fadeIn();
        }
      })
      .done(function(data) {
        $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
          carregaDados();
        /*setTimeout(function() {

        }, 3000);*/
      })
      .fail(function(data) {
        $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
      })
      .always(function() {
        $('#carregando').fadeOut();
      });
    }
      
  }
  function carregaDados() {
    $.ajax({
      url: 'api/equipamentos.php?acao=listar',
      type: 'GET',
      dataType: 'json',
     beforeSend: function() {
       $('#carregando').fadeIn();
     }
    })
    .done(function(data) {
      if(data.dados.length < 1) {
        $('#mensagem-vazio').fadeIn();
      }
      $('#total').html(data.dados.length);
      var tbody = '';
      $.each(data.dados,function(index, value){
        tbody += `<tr>
                  <td>${value.codigo}</td>
                  <td>${value.nome}</td>
                  <td>${value.categoria}</td>
                  <td>${value.data_compra}</td>
                
                  <td>
                    <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalVerDados" onclick="verDados(${value.id})">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="form_equipamentos.php?id=${value.id}" class="btn btn-warning">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger" onclick="deletarDados(${value.id})">
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