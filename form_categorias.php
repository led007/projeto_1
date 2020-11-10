<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
?>
<div class="col">
  <h2>Nova categoria</h2>
  <div class="card">
    <div class="card-body">
      <span id="mensagem"></span>
     <form method="post" onsubmit="return false;">
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="categoria">Categoria*:</label>
             <input type="text" name="categoria" id="categoria" class="form-control" >
             <input type="hidden" name="id" id="id" placeholder="">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="tipo">Tipo*:</label>
             <select name="tipo" id="tipo" class="form-control">
               <option value="Equipamentos" >Equipamentos</option>
               <option value="Produtos" >Produtos</option>
               <option value="Serviços">Serviços</option>
             </select>
           </div>
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
      url: 'api/categorias.php?acao=exibir&id=' + id,
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#carregando').fadeIn();
      }
    })
    .done(function(data) {
      $('#id').val(data.dados.id);
      $('#categoria').val(data.dados.categoria);
      $('#tipo').val(data.dados.tipo);
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
    var categoria = $('#categoria').val();
    var tipo = $('#tipo').val();

    if(categoria == '' || tipo == '') {
      alert('Categoria e tipo são obrigatórios!');
      $('#categoria').focus();
      return false;
    }

    $.ajax({
      url: 'api/categorias.php?acao=salvar',
      type: 'POST',
      dataType: 'json',
      data: {categoria: categoria, tipo: tipo, id: id },
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