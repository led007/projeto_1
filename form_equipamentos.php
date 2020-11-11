<?php
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
?>
<div class="col">
  <h2>Novo equipamento</h2>
  <div class="card">
    <div class="card-body">
      <form method="post" onsubmit="return false;">

        <div class="row">
          <div class="col-md-6 col-sm-12 form-group">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" placeholder="Informe o codigo do Produto" class="form-control" id="codigo">
            <input type="hidden" name="id" id="id">
          </div>
          <div class="col-md-6 col-sm-12 form-group">
            <label for="categoria_id">Categoria</label>
            <select class="form-control" name="categoria_id" id="categoria_id">
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12 form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="informe o nome do Produto" class="form-control" id="nome">
          </div>
          <div class="col-md-4 col-sm-12 form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" min="0.01" name="preco" placeholder="informe o Preço do Produto" class="form-control" id="preco">
          </div>
          <div class="col-md-4 col-sm-12 form-group">
            <label for="data_compra">Data de compra</label>
            <input type="date" name="data_compra" class="form-control" id="data_compra" readonly id="data_compra">
          </div>
        </div>
        <div class="row">
         <div class="col">
            <button class="btn btn-primary" onclick="salvarDados()"><i class="fas fa-save"></i> Salvar</button>
            
         </div>
          
        </div>
      </form>
        
      </div>
      
    </div>
    
  </div>
  <?php 
include_once('layout/footer.php');
?>
<script>
  $(document).ready(function() {
    let procuraParametro = new URLSearchParams(window.location.search);
    if(procuraParametro.has('id') && procuraParametro.get('id') != '') {
      carregaDados(procuraParametro.get('id'));
    }
  })
  function carregaDados(id) {
    $.ajax({
      url: 'api/equipamentos.php?acao=exibir&id=' + id,
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#carregando').fadeIn();
      }
    })
    .done(function(data) {
      $('#id').val(data.dados.id);
      $('#nome').val(data.dados.nome);
      $('#codigo').val(data.dados.codigo);
      $('#categoria_id').val(data.dados.categoria_id);
      $('#preco').val(data.dados.preco);
      $('#data_compra').val(data.dados.data_compra);
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
    })
    .fail(function(data) {
      $('#mensagem').html(retornaMensagemAlert(data.responseJSON.mensagem, data.responseJSON.alert));
    })
    .always(function() {
      $('#carregando').fadeOut();
    });
    
  }
  function salvarDados() {
    var id = $('#id').val();
    var nome = $('#nome').val();
    var codigo = $('#codigo').val();
    var categoria_id = $('#categoria_id').val();
    var preco = $('#preco').val();
    var data_compra = $('#data_compra').val();

    if(nome == '' || codigo == '') {
      alert('Nome e Codigo são obrigatórios!');
      $('#codigo').focus();
      return false;
    }

    $.ajax({
      url: 'api/equipamentos.php?acao=salvar',
      type: 'POST',
      dataType: 'json',
      data: {nome: nome, codigo: codigo, id: id, preco: preco, data_compra: data_compra, categoria_id: categoria_id, },
      beforeSend: function(){
        $('#carregando').fadeIn();
      }
    })
    .done(function(data) {
      $('#id').val(data.dados.id);
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
      console.log(data);
    })
    .fail(function() {
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
    })
    .always(function(data) {
      $('#carregando').fadeOut();
    });
    
  }
</script>

