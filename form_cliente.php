<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
include_once('bd/estados.php');
?>
<div class="col">
  <h2>Novo cliente</h2>
  <div class="card">
    <div class="card-body">
      <span id="mensagem"></span>
     <form method="post" onsubmit="return false;">
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="cpf">CPF:</label>
             <input type="text" name="cpf" id="cpf" class="form-control cpf" required >
           </div>
         </div>
         <div class="col-md-8 col-sm-12">
           <div class="form-group">
             <label for="nome">Nome:</label>
             <input type="text" name="nome" id="nome" class="form-control" required >

              <input type="hidden" name="usuario_id" id="usuario_id" value="1" readonly>

              <input type="hidden" name="id" id="id" readonly>
           </div>
          </div>
         </div>

       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="telefone">Telefone:</label>
             <input type="text" name="telefone" id="telefone" class="form-control fone" >
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="email">E-mail:</label>
             <input type="email" name="email" id="email" class="form-control" required >
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="convenio">Convênio:</label>
             <input type="text" name="convenio" id="convenio" class="form-control" >
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="num_convenio">Nº Convênio:</label>
             <input type="number" name="num_convenio" id="num_convenio" class="form-control" >
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cep">CEP:</label>
             <input type="text" name="cep" id="cep" class="form-control cep" >
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="logradouro">Logradouro:</label>
             <input type="text" name="logradouro" id="logradouro" class="form-control" >
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="numero">Número:</label>
             <input type="text" name="numero" id="numero" class="form-control" >
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="complemento">Complemento:</label>
             <input type="text" name="complemento" id="complemento" class="form-control" >
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="bairro">Bairro:</label>
             <input type="text" name="bairro" id="bairro" class="form-control" >
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cidade">Cidade:</label>
             <input type="text" name="cidade" id="cidade" class="form-control" >
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
           <button class="btn btn-primary w-100" onclick="salvarDados()"><i class="fas fa-save"></i> Salvar</button>
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
      url: 'api/clientes.php?acao=exibir&id=' + id,
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#carregando').fadeIn();
      }
    })
    .done(function(data) {
      $('#id').val(data.dados.id);
      $('#usuario_id').val(data.dados.usuario_id);
      $('#cpf').val(data.dados.cpf);
      $('#nome').val(data.dados.nome);
      $('#telefone').val(data.dados.telefone);
      $('#email').val(data.dados.email);
      $('#convenio').val(data.dados.convenio);
      $('#num_convenio').val(data.dados.num_convenio);
      $('#cep').val(data.dados.cep);
      $('#logradouro').val(data.dados.logradouro);
      $('#numero').val(data.dados.numero);
      $('#complemento').val(data.dados.complemento);
      $('#bairro').val(data.dados.bairro);
      $('#cidade').val(data.dados.cidade);
      $('#estado').val(data.dados.estado);
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
      
    })
    .fail(function(data) {
      $('#mensagem').html(retornaMensagemAlert(data.responseJSON.mensagem, data.responseJSON.alert));
    })
    .always(function() {
      $('#carregando').fadeOut();
    })
  }

  function salvarDados() {
    var id = $('#id').val();
    var usuario_id = $('#usuario_id').val();
    var cpf = $('#cpf').val();
    var nome = $('#nome').val();
    var telefone = $('#telefone').val();
    var email = $('#email').val();
    var convenio = $('#convenio').val();
    var num_convenio = $('#num_convenio').val();
    var cep = $('#cep').val();
    var logradouro = $('#logradouro').val();
    var numero = $('#numero').val();
    var complemento = $('#complemento').val();
    var bairro = $('#bairro').val();
    var cidade = $('#cidade').val();
    var estado = $('#estado').val();
    

    if(nome == '' || cpf == '' || email == '') {
      alert('Nome, CPF e E-mail são obrigatórios!');
      $('#cpf').focus();
      return false;
    }

    $.ajax({
      url: 'api/clientes.php?acao=salvar',
      type: 'POST',
      dataType: 'json',
      data: {cpf: cpf, nome: nome, telefone: telefone, email: email, convenio: convenio, num_convenio: num_convenio, cep: cep, logradouro: logradouro, numero: numero, complemento: complemento, bairro: bairro, cidade: cidade, estado: estado, id: id, usuario_id: usuario_id},
      beforeSend: function(){
        $('#carregando').fadeIn();
      }
    })
    .done(function(data) {
      $('#id').val(data.dados.id);
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
      console.log(data);
    })
    .fail(function(data){
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
    })
    .always(function(){
      $('#carregando').fadeOut();
    });
  }
</script>