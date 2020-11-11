<?php 
include_once('bd/conexao.php');

$sql = "SELECT * FROM categoria WHERE tipo = 'Serviços'";
$qr = mysqli_query($conexao, $sql);
$categorias = mysqli_fetch_all($qr, MYSQLI_ASSOC);


if(isset($_GET['id']) && $_GET['id'] != '') {
  $sql_servico = "SELECT * FROM servicos WHERE id = " . $_GET['id'];
  $qr_servico = mysqli_query($conexao, $sql_servico);
  $servico = mysqli_fetch_assoc($qr_servico);
} else {
  $servico = '';
}


include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
 ?>

 <div class="col">
<h2>Novo Serviço</h2>
      <div class="card">
        <div class="card-body">
          <span id="mensagem"></span>
         <form method="post" onsubmit="return false;">
           <div class="row">
             <div class="col-md-3 col-sm-12">
               <div class="form-group">
                 <label for="codigo">Código*:</label>
                 <input type="text" name="codigo" id="codigo" class="form-control">
                 <input type="hidden" name="id" id="id"  placeholder="">
               </div>
             </div>
             <div class="col-md-9 col-sm-12">
               <div class="form-group">
                 <label for="nome">Nome*:</label>
                 <input type="text" name="nome" id="nome" class="form-control">
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-md-4 col-sm-12">
               <div class="form-group">
                 <label for="descricao">Descrição:</label>
                 <input type="text" name="descricao" id="descricao" class="form-control">
               </div>
             </div>
             <div class="col-md-4 col-sm-12">
               <div class="form-group">
                 <label for="preco">Preço*:</label>
                 <input type="number" name="preco" id="preco" class="form-control">
               </div>
             </div>
             <div class="col-md-4 col-sm-12">
               <div class="form-group">
                 <label for="categoria_id">Categoria*:</label>
                 <select name="categoria_id" id="categoria_id" class="form-control">
                   <option value="Escolha">Escolha</option>
                   <option value="1">Coleta</option>
                   <option value="5">Exames</option>
                 </select>
              <input type="hidden" name="usuario_id" id="id" class="form-control">   
               </div>
             </div> 
           </div>

           <div class="row">
             <div class="col">
               <button class="btn btn-primary" onclick="salvarDados()">
                <i class="fas fa-save"></i> Salvar</button>
             </div>
           </div>

         </form>

        </div>
      </div>
    </div>
 <?php include_once('layout/footer.php');
?>
<script>
  $(document).ready(function() {
    let procuraParametro = new URLSearchParams(window.location.search);
    if (procuraParametro.has('id') &&
      procuraParametro.get('id') != '') {
    carregaDados(procuraParametro.get('id'));
   }
  })
  function carregaDados(id) {
    $.ajax({
      url: 'api/servicos.php?acao=exibir&id=' + id,
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#carregando').fadeIn();
      }
    })
    .done(function(data) {
      $('#id').val(data.dados.id);
      $('#codigo').val(data.dados.codigo);
      $('#nome').val(data.dados.nome);
      $('#descricao').val(data.dados.descricao);
      $('#preco').val(data.dados.preco);
      $('#categoria_id').val(data.dados.categoria_id);
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
    var codigo = $('#codigo').val();
    var nome = $('#nome').val();
    var descricao = $('#descricao').val();
    var preco = $('#preco').val();
    var categoria_id = $('#categoria_id').val();

    if (codigo == '' || nome == '' || preco == '') {
      alert('Código, nome e preço são obrigatórios!!');
      $('#codigo').focus();
      return false;
    }

    $.ajax({
      url: 'api/servicos.php?acao=salvar',
      type: 'POST',
      dataType: 'json',
      data: {codigo: codigo, nome: nome, descricao: descricao, preco: preco, categoria_id: categoria_id, id: id },
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