<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
?>

<div class="col">
<h2>Novo Fornecedor</h2>
<?php include_once('layout/mensagens.php'); ?>
   <div class="row "> 
    <div class="offset-9 col-3 w-100">
      
    <a href="javascript:history.back(-1)" title="" class="btn btn-secondary w-100 ">
         <i class="fas fa-arrow-left"></i> Voltar
         </a>
       </div>
    </div>
  <div class="card">
    <div class="card-body">
       <span id="mensagem"></span>
     <form method="post" onsubmit="return false;">
       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cnpj">CNPJ:</label>
             <input type="text" name="cnpj" id="cnpj" class="form-control cnpj">
             <input type="hidden" name="id" id="id" placeholder="">
           </div>
         </div>
         <div class="col-md-9 col-sm-12">
           <div class="form-group">
             <label for="fantasia">Fantasia:</label>
             <input type="text" name="fantasia" id="fantasia" class="form-control">
           </div>
         </div>
         <div class="col-md-12 col-sm-12">
           <div class="form-group">
             <label for="razao_social">Razão Social:</label>
             <input type="text" name="razao_social" id="razao_social" class="form-control">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="telefone">Telefone:</label>
             <input type="text" name="telefone" id="telefone" class="form-control fone">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="email">E-mail:</label>
             <input type="email" name="email" id="email" class="form-control">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12 col-sm-12">
           <div class="form-group">
             <label for="nome_contato">Nome do Contato:</label>
             <input type="text" name="nome_contato" id="nome_contato" class="form-control">
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cep">CEP:</label>
             <input type="text" name="cep" id="cep" class="form-control cep">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="logradouro">Logradouro:</label>
             <input type="text" name="logradouro" id="logradouro" class="form-control">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="numero">Número:</label>
             <input type="text" name="numero" id="numero" class="form-control">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="complemento">Complemento:</label>
             <input type="text" name="complemento" id="complemento" class="form-control">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="bairro">Bairro:</label>
             <input type="text" name="bairro" id="bairro" class="form-control">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cidade">Cidade:</label>
             <input type="text" name="cidade" id="cidade" class="form-control">
           </div>
         </div>
         <div class="col-md-2 col-sm-12">
           <div class="form-group">
             <label for="estado">Estado:</label>
             <select name="estado" class="form-control" id="estado">
               <option value="">Escolha</option>
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
<script src="js/estados.js" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    let procuraParametro = new URLSearchParams(window.location.search);
    if(procuraParametro.has('id') && procuraParametro.get('id') != '') {
      carregaDados(procuraParametro.get('id'));
    }

    var laco_estados = '';
    $.each(estados,function(index, el) {
        laco_estados += `<option value="${el.sigla}">${el.sigla}</option>`; 
    });
    $('#estado').append(laco_estados);

  })
  function carregaDados(id) {
    $.ajax({
      url: 'api/fornecedores.php?acao=exibir&id=' + id,
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#carregando').fadeIn();
        $('#mensagem').fadeIn();
      }
    })
    .done(function(data) {
      $('#id').val(data.dados.id);
      $('#cnpj').val(data.dados.cnpj);
      $('#fantasia').val(data.dados.fantasia);
      $('#razao_social').val(data.dados.razao_social);
      $('#telefone').val(data.dados.telefone);
      $('#email').val(data.dados.email);
      $('#nome_contato').val(data.dados.nome_contato);
      $('#cep').val(data.dados.cep);
      $('#numero').val(data.dados.numero);
      $('#complemento').val(data.dados.complemento);
      $('#bairro').val(data.dados.bairro);
      $('#cidade').val(data.dados.cidade);
      $('#estado').val(data.dados.estado);
      $('#logradouro').val(data.dados.logradouro);
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
    var cnpj = $('#cnpj').val();
    var fantasia = $('#fantasia').val();
    var razao_social = $('#razao_social').val();
    var telefone = $('#telefone').val();
    var email = $('#email').val();
    var nome_contato = $('#nome_contato').val();
    var cep = $('#cep').val();
    var numero = $('#numero').val();
    var complemento = $('#complemento').val();
    var bairro = $('#bairro').val();
    var cidade = $('#cidade').val();
    var estado = $('#estado').val();
    var logradouro = $('#logradouro').val();

    if(cnpj == '' || fantasia == '') {
      alert('CNPJ e Nome Fantasia são obrigatórios!');
      $('#cnpj').focus();
      return false;
    }

    $.ajax({
      url: 'api/fornecedores.php?acao=salvar',
      type: 'POST',
      dataType: 'json',
      data: {
              cnpj: cnpj, 
              fantasia: fantasia, 
              id: id, 
              razao_social: razao_social, 
              telefone: telefone, 
              email: email, 
              nome_contato: nome_contato, 
              cep: cep, 
              numero: numero, 
              complemento: complemento, 
              bairro: bairro, 
              cidade: cidade, 
              logradouro: logradouro, 
              estado: estado
            },
      beforeSend: function(){
        $('#carregando').fadeIn();
      }
    })
    .done(function(data) {
      $('#id').val(data.dados.id);
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
     
    })
    .fail(function() {
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
    })
    .always(function(data) {
      $('#carregando').fadeOut();
    });
    
  }

</script>